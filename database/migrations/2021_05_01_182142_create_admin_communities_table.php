<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_communities', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('community_id');

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("community_id")->references("id")->on("communities");
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
        Schema::dropIfExists('admin_communities');
    }
}
