<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobbies', function (Blueprint $table) {
            $table->tinyIncrements("id");
            $table->string("name");
        });

        Schema::create('user_hobby', function (Blueprint $table) {
            
            $table->integer("user_id")->unsigned();
            $table->tinyInteger("hobby_id");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("hobby_id")->references("id")->on("hobbies")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobbies');
        Schema::dropIfExists('user_hobby');
    }
}
