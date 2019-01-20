<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function index()
    {

        $comments = Comment::where('approved' , 1)->latest()->paginate(20);
        return view('Admin.comments.all',compact('comments' ));
    }

    public function unsuccessful()
    {
        $comments = Comment::where('approved' , 0)->latest()->paginate(20);
        return view('Admin.comments.approved',compact('comments' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update(['approved' => 1]);
        $comment->article()->increment('commentCount');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Comment $comment)
    {
        $comment->article()->decrement('commentCount');

        $comment->delete();
        return back();
    }
}
