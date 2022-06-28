<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bigInteger('post_id');
            $table->text('body');
            // $table->smallInteger('upvotes');
            // $table->smallInteger('downvotes');
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
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
        Schema::dropIfExists('comments');
    }
}
