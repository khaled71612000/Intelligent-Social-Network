<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // tags for posts
        Schema::create('tags', function (Blueprint $table) {
            $table->tinyIncrements("id");
            $table->string("name");
        });

        Schema::create('communities_tags', function (Blueprint $table) {
            $table->integer('community_id');
            $table->tinyInteger('tag_id');

            $table->foreign("community_id")->references("id")->on("communities")->onDelete("cascade");
            $table->foreign("tag_id")->references("id")->on("tags")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('communities_tags');
        // Don't forget to create Model
    }
}
