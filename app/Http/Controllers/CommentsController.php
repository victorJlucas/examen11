<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        Comments::create([
            'author' => $request['author'] != null ? $request['author'] : 'Anónimo',
            'title' => $request['title'] != null ? $request['title'] : 'Sin título',
            'body' => $request['body'],
            'post_id' => $post->id
        ]);

        return redirect()
            ->route('posts.show', $post);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Comments $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comments $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Comments $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comment)
    {
        return view('posts.comments',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Comments $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comment)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment->update($request->all());

        return redirect()->route('posts.show', $comment->post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Comments $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comment)
    {
        $comment->delete();
        return back()->with('flash', 'Comentario eliminado');

    }
}
