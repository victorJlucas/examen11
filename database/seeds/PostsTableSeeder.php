<?php

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $post = new Post;
        $post->title = 'Mi primer post';
        $post->slug = Str::slug('Mi primer post');
        $post->excerpt = 'Extracto de mi primer post';
        $post->body = '<p>Contenido de mi primer post</p>';
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->save();

        $post = new Post;
        $post->title = 'Mi segundo post';
        $post->slug = Str::slug('Mi segundo post');
        $post->excerpt = 'Extracto de mi segundo post';
        $post->body = '<p>Contenido de mi segundo post</p>';
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->save();

        $post = new Post;
        $post->title = 'Mi tercer post';
        $post->slug = Str::slug('Mi tercer post');
        $post->excerpt = 'Extracto de mi tercer post';
        $post->body = '<p>Contenido de mi tercer post</p>';
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->save();

        $post = new Post;
        $post->title = 'Mi cuarto post';
        $post->slug = Str::slug('Mi cuarto post');
        $post->excerpt = 'Extracto de mi cuarto post';
        $post->body = '<p>Contenido de mi cuarto post</p>';
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 2;
        $post->save();
        */

        $categories = Category::all();
        $categories->each(function ($c) {
            $posts = factory(Post::class, 10)->make();
            $c->posts()->saveMany($posts);
            $posts->each(function ($p) {
                $p->slug = Str::slug($p->title);
                $p->save();
                $tags = Tag::all()->pluck('id')->toArray();
                $p->tags()->attach(\Illuminate\Support\Arr::random($tags,2));
            });
        });
    }
}
