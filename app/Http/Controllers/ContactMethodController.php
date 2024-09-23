<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMethodRequest;
use App\Models\ContactMethod;
use Illuminate\Http\Request;

class ContactMethodController extends Controller
{
    private ContactMethod $contactMethod;
    
    public function __construct(ContactMethod $contactMethod)
    {
        $this->contactMethod = $contactMethod;
    }

    public function index()
    {
        $contactMethods = ContactMethod::all();

        $contactIcons = collect([
            ['icon' => 'fas fa-envelope', 'fieldName' => 'email'],
            ['icon' => 'fas fa-phone', 'fieldName' => 'phone'],
            ['icon' => 'fab fa-facebook', 'fieldName' => 'facebook'],
            ['icon' => 'fab fa-whatsapp', 'fieldName' => 'whatsapp'],
            ['icon' => 'fab fa-telegram', 'fieldName' => 'telegram'],
        ]);
        
        return view('hiraa.contact.index')->with([
            'contactMethods' => $contactMethods,
            'contactIcons' => $contactIcons,
            'isEmpty' => $contactMethods->isEmpty(),
        ]);
    }

    public function create()
    {
        return view('hiraa.contact.create');
    }

    public function store(ContactMethodRequest $request)
    {
        $existingContactMethod = ContactMethod::where('user_id', auth()->id())->first();
        
        if ($existingContactMethod) {
            return redirect()->route('contact.index')->with('error', 'Another contact cannot be added, the current contact must be deleted first.');
        }
    
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        
        ContactMethod::create($data);
        
        return redirect()->route('contact.index')->with('success', 'Contact information has been added successfully.');
    }
    
    public function review(Request $request)
    {
        // Extract form data
        $data = $request->all();
    
        // Generate review content
        $content = '<ul>';
        foreach ($data as $key => $value) {
            if (!empty($value) && $key != '_token') {
                $label = ucfirst($key);
                $content .= "<li><strong>{$label}:</strong> {$value}</li>";
            }
        }
        $content .= '</ul>';
    
        return response()->json($content);
    }

    public function updateItem(Request $request)
    {
        $contactMethod = ContactMethod::find($request->id);
        
        if ($contactMethod) {
            $contactMethod->update([$request->field => $request->value]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Contact method not found.']);
        }
    }
    
    public function deleteItem(Request $request)
    {
        $contactMethod = ContactMethod::find($request->id);
        
        if ($contactMethod) {
            $contactMethod->update([$request->field => null]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Contact method not found.']);
        }
    }

}
