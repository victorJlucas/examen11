<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'photo' => 'required | image | max:2048'
        ]);

        $photo = $request->file('photo')->store('public');

        Photo::create([
            'post_id'   => $post->id,
            'url'       => Storage::url($photo)
        ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        $photoPath = str_replace('storage', 'public', $photo->url);
        Storage::delete($photoPath);
        return back()->with('flash', 'Foto eliminada');
    }
}
