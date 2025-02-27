<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\Article\ArticleService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

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
        return view('new', ['fields' => ArticleService::getAddFormFields()]);
    }

    public function save(Request $request): RedirectResponse
    {
        ArticleService::validateAddFormRequest($request);
        return redirect('new');
    }
}
