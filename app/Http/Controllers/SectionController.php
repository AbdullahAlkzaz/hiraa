<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    private Section $sectioneModel;
    public function __construct(Section $sectioneModel)
    {
        $this->sectioneModel = $sectioneModel;
    }
    public function index(Request $request)
    {
        $sections = $this->sectioneModel->where(function ($query) use ($request) {
            if (isset($request->name)) {
                $query->where("name", $request->neme);
            }
        })->paginate(20);
        return view('hiraa.sections.sections')->with([
            'sections' => $sections,
        ]);
    }

    public function create()
    {
        return view('hiraa.sections.create');
    }

    public function store(StoreSectionRequest $request)
    {
        $data = $request->validated();

        if ($request->media_type === 'image' && $request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sections', 'public');
            $data['image'] = $imagePath;
        } elseif ($request->media_type === 'video') {
            if ($request->filled('video_link')) {
                $data['video_link'] = $request->video_link;
            } else {
                return redirect()->back()->withErrors(['video_link' => 'The video link field is required when media type is video.']);
            }
        }

        $this->sectioneModel->create($data);

        session()->flash('message', __("The section was created successfully."));
        return redirect()->route('sections.sections');
    }


    public function show($id)
    {
        $section = Section::findOrFail($id);
        return view('hiraa.sections.show', compact('section'));
    }

    public function edit($id)
    {
        $section = Section::find($id);
        return view('hiraa.sections.edit', compact('section'));
    }

    public function update(UpdateSectionRequest $request, $id)
    {
        $section = Section::findOrFail($id);

        // تحديث البيانات الأساسية
        $section->title = $request->input('title');
        $section->description = $request->input('description');
        $section->media_type = $request->input('media_type');

        // إذا كانت الميديا المختارة صورة
        if ($section->media_type === 'image') {
            if ($request->hasFile('image')) {
                // حذف الصورة القديمة إذا كانت موجودة
                if ($section->image) {
                    \Storage::disk('public')->delete($section->image);
                }

                // تخزين الصورة الجديدة
                $image = $request->file('image');
                $imagePath = $image->store('sections', 'public');
                $section->image = $imagePath;

                $section->video_link = null;
            }
        }

        if ($section->media_type === 'video') {
            if ($request->input('video_link')) {

                $section->video_link = $request->input('video_link');

                if ($section->image) {
                    \Storage::disk('public')->delete($section->image);
                    $section->image = null;
                }
            }
        }

        $section->save();

        return redirect()->route('sections.sections')->with('success', 'Section updated successfully.');
    }

    public function delete($id)
    {
        try {
            $section = Section::findOrFail($id);

            // حذف الصورة إذا كانت موجودة
            if ($section->image) {
                Storage::disk('public')->delete($section->image);
            }

            // إزالة رابط الفيديو من قاعدة البيانات
            if ($section->video_link) {
                $section->video_link = null; // تعيين الفيديو كـ null أو تركه في قاعدة البيانات
            }

            $section->delete();

            session()->flash('message', 'The section was deleted successfully.');
            return redirect()->route('sections.sections');
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }
}
