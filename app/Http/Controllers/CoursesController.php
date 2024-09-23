<?php

namespace App\Http\Controllers;

use App\Models\Course; // تأكد من استخدام Models
use App\Http\Requests\CreateCourseRequest; // تصحيح الاستيراد
use App\Http\Requests\UpdateCourseRequest;
use App\Services\ContactMethodService;
use Illuminate\Support\Facades\storage;
use Illuminate\Http\Request;
use Exception;

class CoursesController extends Controller
{
    protected $contactMethodService;
    private Course $courseModel;

    public function __construct(ContactMethodService $contactMethodService, Course $courseModel) {
        $this->contactMethodService = $contactMethodService;
        $this->courseModel = $courseModel;
    }

    public function index() 
    {
        $courses = $this->courseModel->all();
        return view('hiraa.courses.courses', compact('courses'));
    }

    public function create() 
    {
        return view('hiraa.courses.create');
    }

    public function store(CreateCourseRequest $request)
    {
        $data = $request->validated();
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('courses', 'public');
            $data['image'] = $imagePath;
        }
    
        // تحقق من وجود cards
        if (isset($data['cards'])) {
            // تحويل البطاقات إلى JSON
            $data['card'] = json_encode($data['cards']);
        } else {
            $data['card'] = json_encode([]); // إذا لم توجد بطاقات، تخزين مصفوفة فارغة
        }
    
        // إزالة الحقول غير المطلوبة التي قد تسبب مشاكل
        unset($data['cards']); // تأكد من عدم وجود cards في البيانات المخزنة
    
        // إنشاء الكورس
        $course = Course::create($data);
    
        session()->flash('message', __("The course was created successfully."));
        return redirect()->route('courses.courses');
    }
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $contactIcons = $this->contactMethodService->getContactMethods();

        if ($course->is_hidden) {
            return redirect()->route('courses.courses')->with('error', 'This course is not available.');
    }
        // جلب 6 كورسات عشوائية باستثناء الكورس الحالي والمخفي
        $randomCourses = Course::where('id', '!=', $id)
                                ->where('is_hidden', false) // استبعاد الدورات المخفية
                                ->inRandomOrder()
                                ->limit(6)
                                ->get();
    
        return view('hiraa.courses.show')->with([
            'course' => $course,
            'contactIcons' => $contactIcons,
            'randomCourses' => $randomCourses, // إرسال الكورسات العشوائية للعرض
        ]);
    }
    
    public function edit($id)
    {
        $course = Course::with('cards')->findOrFail($id); 
        return view('hiraa.courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        // تحقق من وجود صورة جديدة
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
    
            // تخزين الصورة الجديدة
            $imagePath = $request->file('image')->store('courses', 'public');
            $course->image = $imagePath; // تحديث المسار الجديد للصورة
        }
    
        // تحديث بيانات الدورة بما في ذلك البطاقات
        if ($request->filled('cards')) {
            // تحويل البطاقات إلى JSON
            $course->card = json_encode($request->input('cards'));
        } else {
            $course->card = json_encode([]); // إذا لم توجد بطاقات، تخزين مصفوفة فارغة
        }
    
        // حفظ التحديثات
        $course->save(); 
    
        return redirect()->route('courses.courses')->with('success', 'Course updated successfully.');
    }

    public function delete($id)
    {
        try {
            $course = Course::findOrFail($id);

            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }

            $course->delete();

            session()->flash('message', 'The course was deleted successfully.');
            return redirect()->route('courses.courses');
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    public function toggleVisibility($id)
    {
        $course = Course::find($id);
        if ($course) {
            $course->is_hidden = !$course->is_hidden;
            $course->save();

            return response()->json(['is_hidden' => $course->is_hidden]);
        }
        return response()->json(['error' => 'Course not found'], 404);
    }


}
