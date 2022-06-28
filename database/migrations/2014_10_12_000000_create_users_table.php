<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments("id");

            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number', 15)->nullable()->unique();
            $table->string("avatar")->nullable();
            $table->string("cover")->nullable();
            $table->string("bio")->nullable();
            $table->string("nickname", 30)->nullable();
            $table->unsignedTinyInteger('gender_id');


            $table->tinyInteger("country_id")->unsigned();
            // $table->tinyInteger("personality")->unsigned();
            // $table->tinyInteger("age")->unsigned();
            // $table->smallInteger("n_friends")->unsigned()->default(0);
            $table->smallInteger("exp")->unsigned()->default(0);

            $table->date("dob");
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp("last_activity")->useCurrent();
            $table->timestamps();

            $table->rememberToken();

            $table->foreign("country_id")->references("id")->on("countries");
            $table->foreign("gender_id")->references("id")->on("genders");
            // $table->foreign("personality")->references("id")->on("personality_types");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
