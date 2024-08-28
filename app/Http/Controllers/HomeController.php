<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Section;


class HomeController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $articles = Article::where('is_hidden', false)->get();

        return view("hiraa.home.index")->with([
            'sections' => $sections,
            'articles' => $articles
        ]);
    }
}
