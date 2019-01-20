<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Article $article
     * @return Article
     */
    public function single(Article $article)
    {
        $article->increment('viewCount');
        $articles = Article::latest()
            ->filter(request(['month', 'year']))
            ->paginate(10);

        $archives = Article::selectRaw(' year(created_at) year, monthname(created_at) month, COUNT(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
//        $articles = Article::latest()->take(15)->get();

        $comments = $article->comments()->where('approved' , 1)->latest()->get();
//        return $comments;
//
        return view('Home.post' , compact('article', 'articles' , 'archives' , 'comments'));

//            return $article;
    }


}
