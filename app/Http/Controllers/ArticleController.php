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
        $articles = Article::latest()->paginate(5);
        $articleServices = [];
        foreach ($articles as $article) {
            $articleServices[] = new ArticleService($article);
        }
        $context = [
            'articles' => $articleServices,
            'pagination' => $articles->links()
        ];
        return view('index', $context);
    }

    public function detail(Article $article): View
    {
        return view('detail', ['article' => new ArticleService($article)]);
    }

    public function new(): View
    {
        return view('new', ['fields' => ArticleService::getAddFormFields()]);
    }

    public function save(Request $request): RedirectResponse
    {
        ArticleService::validateAddFormRequest($request);
        ArticleService::storeAddFormRequest($request);
        return redirect('new');
    }
}
