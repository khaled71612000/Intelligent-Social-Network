<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_followers', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('community_id');
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("community_id")->references("id")->on("communities");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('community_followers');
    }
}
