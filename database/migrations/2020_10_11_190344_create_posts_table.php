<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id("id");
            $table->integer('user_id');
            $table->integer('community_id');//->nullable(); // user may post in his profile
            $table->string("header", 300);
            $table->text("body")->nullable();
            $table->string("image")->nullable();
            // $table->integer('original_id'); SELECT most old user_id // == id , except it's a shared post
            // $table->tinyInteger("privacy")->unsigned()->default(1); // 1: public
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
            // $table->foreign("original_id")->references("id")->on("posts");
            $table->foreign("community_id")->references("id")->on("community");
        });


        Schema::create('shared_posts', function (Blueprint $table) {
            $table->bigInteger("post_id");
            $table->integer('owner_id');
            $table->integer('user_id');


            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("owner_id")->references("id")->on("users");
            $table->foreign("post_id")->references("id")->on("posts");
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
