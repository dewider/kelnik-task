<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('index', ['articles' => Article::latest()->paginate(5)]);
    }

    public function detail(Article $article): View
    {
        return view('detail', ['article' => $article]);
    }

    public function new(): View
    {
        return view('new');
    }
}
