<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArticleRequest;
use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Services\ContactMethodService;
use Exception;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    protected $contactMethodService;
    private Article $articleModel;
    public function __construct(Article $articleModel, ContactMethodService $contactMethodService)
    {
        $this->articleModel = $articleModel;
        $this->contactMethodService = $contactMethodService;
    }
    public function index(Request $request)
    {
        $articales = $this->articleModel->where(function ($query) use ($request) {
            if (isset($request->name)) {
                $query->where("name", $request->neme);
            }
        })->paginate(10);
        return view('hiraa.articles.articles')->with([  
            'articles' => $articales,
        ]);
    }

    public function create()
    {
        return view('hiraa.articles.create');
    }

    public function store(CreateArticleRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $data['image'] = $imagePath;
        }

        $this->articleModel->create($data);

        session()->flash('message', __("The article was created successfully."));
        return redirect()->route('articles.articles');
    }
    
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $contactIcons = $this->contactMethodService->getContactMethods();
        return view('hiraa.articles.show')->with([
            'article' => $article,
            'contactIcons' => $contactIcons,
        ]);
    }

    public function edit(Article $article)
    {
        return view('hiraa.articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        try {
            DB::beginTransaction();

            $data = $request->only(['title', 'body']);

            // Check if a new image is uploaded
            if ($request->hasFile('image')) {
                // Delete the old image
                if ($article->image) {
                    Storage::disk('public')->delete($article->image);
                }
                // Upload the new image
                $imagePath = Storage::disk('public')->put('articles', $request->file('image'));
                $data['image'] = $imagePath;
            }

            $article->update($data);

            DB::commit();
            return redirect()->route('articles.articles', $article->id)->with('success', 'Article updated successfully.');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('error', $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $article = Article::findOrFail($id);

            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $article->delete();

            session()->flash('message', 'The article was deleted successfully.');
            return redirect()->route('articles.index');
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }

    public function toggleVisibility($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->is_hidden = !$article->is_hidden;
            $article->save();

            return response()->json(['is_hidden' => $article->is_hidden]);
        }
        return response()->json(['error' => 'Article not found'], 404);
    }
}
