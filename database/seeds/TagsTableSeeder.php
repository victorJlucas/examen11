<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $tag = new Tag;
        $tag->name = 'Etiqueta 1';
        $tag->save();

        $tag->posts()->attach([1,2,3]);

        $tag = new Tag;
        $tag->name = 'Etiqueta 2';
        $tag->save();

        $tag->posts()->attach([2,3,4]);
        */
        factory(Tag::class, 15)->create();

    }
}
