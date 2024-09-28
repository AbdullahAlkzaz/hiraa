<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Services\ContactMethodService;
use App\Http\Requests\CreateStudentRequest;
use Illuminate\Support\Facades\Http;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;


class StudentsController extends Controller
{
    protected $contactMethodService;
    private Student $studentModel;

    public function __construct(Student $studentModel, ContactMethodService $contactMethodService)
    {
        $this->studentModel = $studentModel;
        $this->contactMethodService = $contactMethodService;
    }

    public function index()
    {
        return view('hiraa.students.index');
    }

    public function registration()
    {
        $contactIcons = $this->contactMethodService->getContactMethods();
        $courses = Course::where('is_hidden', false)
            ->get();

        $response = Http::get('https://restcountries.com/v3.1/all');
        $countries = $response->json();

        return view('hiraa.students.registration')->with([
            'contactIcons' => $contactIcons,
            'courses' => $courses,
            'countries' => $countries,
        ]);
    }

    public function store(CreateStudentRequest $request)
    {
        $data = $request->validated();
        $this->studentModel->create($data);

        // إعداد الرسالة
        $notification = Notification::create(
            'New Registration', // العنوان
            'A new student has registered for a course.' // النص
        );

        $message = CloudMessage::withNotification($notification)
            ->withData([
                'type' => 'registration',
                'message' => 'A new student has registered.'
            ]);

        // إرسال الإشعار إلى جميع الأجهزة
        app('firebase.messaging')->send($message);

        return redirect()->route('students.students')->with('success', 'Student registered successfully!');
    }
}
