<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'iframe', 'published_at', 'category_id', 'excerpt'];

    protected $dates = ['published_at'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->photos->each->delete();
            $post->tags()->detach();
        });
    }

    public static function create(array $attributes = [])
    {
        $post = static::query()->create($attributes);

        $post->generateSlug();

        return $post;
    }

    public function generateSlug()
    {
        $slug = Str::slug($this->title);

        if (static::whereSlug($slug)->exists()) {
            $slug .= '-' . $this->id;
        }
        $this->slug = $slug;
        $this->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');
    }

    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at
                                        ? Carbon::parse($published_at)
                                        : null;
    }

    public function setCategoryIdAttribute($category_id)
    {
        $this->attributes['category_id'] = Category::find($category_id)
            ? $category_id
            : Category::create(['name' => $category_id])->id;
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map( function ($tag) {
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }
}
