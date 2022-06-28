<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->integer("reported_user_id")->unsigned();
            $table->integer("reported_post_id")->unsigned()->nullable(); // in case reporting user only
            $table->string("body");
            //$table->tinyInteger("issue_type");
            $table->timestamp('created_at')->userCurrent();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("reported_user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
