<?php

namespace App\Http\Controllers;

use App\Article;
use App\Profile;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profile = Profile::latest()->get();
        $articles = Article::latest()
            ->filter(request(['month', 'year']))
            ->paginate(10);

        $archives = Article::selectRaw(' year(created_at) year, monthname(created_at) month, COUNT(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
//        return $archives;
        return view('Home.home' , compact('articles', 'archives' , 'profile'));

    }

    public function search ()
    {
        $keyword = request('search');
        $articles = Article::search($keyword)->latest()
            ->filter(request(['month', 'year']))
            ->paginate(10);

        $archives = Article::selectRaw(' year(created_at) year, monthname(created_at) month, COUNT(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
//        return $articles;
        return view('Home.home' , compact('articles', 'archives'));
    }

    public function comment(Article $article)
    {
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required|min:5'
        ]);

        $article->comments()->create([
            'name' => request('name'),
            'email' => request('email'),
            'comment' => request('comment')
        ]);

        return back();
    }
}
