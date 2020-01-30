<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->paginate(5);
        $title = 'Posts de la etiqueta: ' . $tag->name;

        return view('welcome', compact('posts', 'tag', 'title'));
    }
}
