<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate(5);
        $title = 'Posts de la categoría: ' . $category->name;

        return view('pages.home', compact('posts', 'category', 'title'));
    }
}
