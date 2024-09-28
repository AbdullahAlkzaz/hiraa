<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\About;
use App\Models\Section;
use App\Models\Course;
use App\Services\ContactMethodService;

class HomeController extends Controller
{
    protected $contactMethodService;

    public function __construct(ContactMethodService $contactMethodService)
    {
        $this->contactMethodService = $contactMethodService;
    }

    public function index()
    {
        $sections = Section::all();
        
        // استرجاع أحدث 6 مقالات غير مخفية
        $articles = Article::where('is_hidden', false)
            ->latest()            
            ->take(6)  
            ->get();

            $courses = Course::where('is_hidden', false)
            ->latest()            
            ->take(6)  
            ->get();

        // جلب معلومات الـ "About"
        $about = About::first();

        // معالجة كل قسم للحصول على معرّف الفيديو
        foreach ($sections as $section) {
            $section->videoId = $this->extractVideoId($section->video_link);
        }

        // استرجاع أيقونات التواصل
        $contactIcons = $this->contactMethodService->getContactMethods();

        // تمرير البيانات إلى الـ View
        return view('hiraa.home.index')->with([
            'sections' => $sections,
            'articles' => $articles,
            'courses' => $courses,
            'contactIcons' => $contactIcons,
            'about' => $about,
        ]);
    }

    // وظيفة خاصة لاستخراج معرّف الفيديو
    private function extractVideoId($video_link)
    {
        $videoId = '';

        if (strpos($video_link, 'youtube.com') !== false) {
            parse_str(parse_url($video_link, PHP_URL_QUERY), $query);
            $videoId = $query['v'] ?? '';
        } elseif (strpos($video_link, 'youtu.be') !== false) {
            $videoId = basename($video_link);
        }

        return $videoId;
    }
}
