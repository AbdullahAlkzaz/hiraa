<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Requests\CreateAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use Illuminate\Support\Facades\storage;
use Exception;
use App\Services\ContactMethodService;
use Illuminate\Support\Facades\DB;


class aboutController extends Controller
{
    protected $contactMethodService;
    private About $aboutModel;
    public function __construct(About $aboutModel, ContactMethodService $contactMethodService)
    {
        $this->aboutModel = $aboutModel;
        $this->contactMethodService = $contactMethodService;
    }

    
    public function index()
    {
        // افتراض أن لديك كائن "about" جاهز
        $about = $this->aboutModel->first();

        // استخراج معرف الفيديو من الرابط إذا كان موجودًا
        $videoId = '';
        if ($about && $about->video_link) {
            if (strpos($about->video_link, 'youtube.com') !== false) {
                parse_str(parse_url($about->video_link, PHP_URL_QUERY), $query);
                $videoId = $query['v'] ?? '';
            } elseif (strpos($about->video_link, 'youtu.be') !== false) {
                $videoId = basename($about->video_link);
            }
        }

        // تكوين رابط الـ embed للفيديو إذا كان المعرف موجودًا
        $embedUrl = $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;

        // إرسال البيانات إلى الـ View
        return view('hiraa.about.index')->with([
            'about' => $about,
            'embedUrl' => $embedUrl,
            'aboutExists' => $about ? true : false,
        ]);
    }

    public function create()
    {
        return view('hiraa.about.create');
    }

    public function store(CreateAboutRequest $request)
    {
        // التحقق من وجود بيانات في جدول about
        if ($this->aboutModel->exists()) {
            return redirect()->route('about.about')->with('error', 'There is already existing data, you cannot add more.');
        }

        // التحقق من صحة البيانات
        $data = $request->validated();

        // التعامل مع رفع الصورة
        if ($request->media_type === 'image' && $request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about', 'public');
            $data['image'] = $imagePath;
            $data['video_link'] = null; // تفريغ الفيديو في حالة رفع صورة
        } 
        elseif ($request->media_type === 'video') {
            if ($request->filled('video_link')) {
                $data['video_link'] = $request->video_link;
                $data['image'] = null; // تفريغ الصورة في حالة رفع فيديو
            } else {
                return redirect()->back()->withErrors(['video_link' => 'The video link field is required when media type is video']);
            }
        }

        // إنشاء البيانات في قاعدة البيانات
        $this->aboutModel->create($data);

        session()->flash('message', __("The section was created successfully."));
        return redirect()->route('about.about');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('hiraa.about.edit', compact('about'));
    }

    public function update(UpdateAboutRequest $request, $id)
    {
        $about = About::findOrFail($id);
    
        // Update based on the selected media type from the request
        $mediaType = $request->input('media_type');
    
        // إذا كانت الميديا المختارة صورة
        if ($mediaType === 'image') {
            if ($request->hasFile('image')) {
                // حذف الصورة القديمة إذا كانت موجودة
                if ($about->image) {
                    \Storage::disk('public')->delete($about->image);
                }
    
                // تخزين الصورة الجديدة
                $image = $request->file('image');
                $imagePath = $image->store('about', 'public');
                $about->image = $imagePath;
    
                // إزالة رابط الفيديو إذا كان موجوداً
                $about->video_link = null;
            }
        }
    
        // إذا كانت الميديا المختارة فيديو
        if ($mediaType === 'video') {
            if ($request->input('video_link')) {
                // تحديث رابط الفيديو
                $about->video_link = $request->input('video_link');
    
                // حذف الصورة إذا كانت موجودة
                if ($about->image) {
                    \Storage::disk('public')->delete($about->image);
                    $about->image = null;
                }
            }
        }
    
        // تحديث الوصف
        $about->description = $request->input('description');
    
        // حفظ التحديثات
        $about->save();
    
        return redirect()->route('about.about')->with('success', 'Section updated successfully.');
    }
    
    public function show($id)
    {
        // استرجاع السجل بناءً على الـ id
        $about = $this->aboutModel->find($id);

        // التأكد من وجود البيانات
        if (!$about) {
            return redirect()->route('about.index')->with('error', 'No about section found.');
        }

        // استخراج ID الفيديو من رابط YouTube
        $videoId = '';
        if ($about->video_link) {
            if (strpos($about->video_link, 'youtube.com') !== false) {
                parse_str(parse_url($about->video_link, PHP_URL_QUERY), $query);
                $videoId = $query['v'] ?? '';
            } elseif (strpos($about->video_link, 'youtu.be') !== false) {
                $videoId = basename($about->video_link);
            }
        }

        // تحضير رابط التضمين
        $embedUrl = $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;

        // استرجاع أيقونات الاتصال من الخدمة
        $contactIcons = $this->contactMethodService->getContactMethods();

        // إرسال البيانات إلى الـ View
        return view('hiraa.about.show')->with([
            'about' => $about,
            'embedUrl' => $embedUrl,
            'contactIcons' => $contactIcons,
        ]);
    }

}
