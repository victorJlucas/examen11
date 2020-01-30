<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $post = new Post;
        $post->title = $request->title;
        $post->save();

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'category_id'   => 'required',
            'excerpt'   => 'required',
            'tags'  => 'required'
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->iframe = $request->iframe;
        $post->excerpt = $request->excerpt;
        $post->published_at = $request->published_at ? Carbon::parse($request->published_at) : null;
        $post->category_id = $request->category_id;
        $post->update();

        $post->tags()->sync($request->tags);

        return redirect()
            ->route('admin.posts.edit', $post)
            ->with('flash', 'El post ha sido actualizado correctamente');
    }
}
