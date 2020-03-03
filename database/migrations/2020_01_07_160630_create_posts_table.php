<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title');
            $table->string('slug')->nullable();
            $table->mediumText('visits')->nullable();
            $table->mediumText('excerpt')->nullable();
            $table->mediumText('iframe')->nullable();
            $table->text('body')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->on('categories')->references('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
