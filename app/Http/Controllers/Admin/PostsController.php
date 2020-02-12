<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::allowed()->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Post);
        $this->validate($request, ['title' => 'required | min:3']);

        $post = Post::create($request->all());

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('admin.posts.edit', [
            'post'  => $post,
            'categories' => Category::all(),
            'tags'  => Tag::all()
        ]);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update($request->all());

        $post->syncTags($request->tags);

        return redirect()
            ->route('admin.posts.edit', $post)
            ->with('flash', 'El post ha sido actualizado correctamente');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('flash', 'El post ha sido eliminado');
    }
}
