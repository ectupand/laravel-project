<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = new Article();
        return view('index', ['articles' => $articles]);

    }

    public function articles(): View
    {
        $articles = Article::query()->paginate(10);
        return view('articles', ['articles' => $articles]);
    }

    public function article(string $slug): View
    {
        $article = Article::query()->findOrFail($slug);
        return view('article', ['article' => $article]);
    }
}
