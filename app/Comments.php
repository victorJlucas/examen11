<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['id', 'title', 'author', 'body', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}


