<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privacy_types', function (Blueprint $table) {
            $table->tinyIncrements("id");
            $table->string("type"); // 1 Only Me, 2 Friends, 3 Everyone
        });

        Schema::create('privacies', function (Blueprint $table) {
            $public_type = 3;
            $friends_type = 2;
            $private_type = 1;
            $default_privacy_id = $friends_type;

            $table->increments("user_id");
            $table->tinyInteger("email_type_id")->unsigned()->default($default_privacy_id);
            $table->tinyInteger("phone_type_id")->unsigned()->default($default_privacy_id);
            $table->tinyInteger("dob_type_id")->unsigned()->default($default_privacy_id);
            $table->tinyInteger("country_type_id")->unsigned()->default($public_type);
            $table->tinyInteger("hobby_type_id")->unsigned()->default($default_privacy_id);
            $table->tinyInteger("gender_type_id")->unsigned()->default($public_type);
            $table->tinyInteger("join_date_type_id")->unsigned()->default($public_type);
            $table->tinyInteger("personality_type_id")->unsigned()->default($default_privacy_id);
            $table->tinyInteger("emotion_type_id")->unsigned()->default($private_type);
            $table->tinyInteger("learning_style_type_id")->unsigned()->default($default_privacy_id);
            $table->tinyInteger("friends_type_id")->unsigned()->default($default_privacy_id);

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");

            $table->foreign('email_type_id')->references('id')->on('privacy_types');
            $table->foreign('phone_type_id')->references('id')->on('privacy_types');
            $table->foreign('dob_type_id')->references('id')->on('privacy_types');
            $table->foreign('country_type_id')->references('id')->on('privacy_types');
            $table->foreign('hobby_type_id')->references('id')->on('privacy_types');
            $table->foreign('gender_type_id')->references('id')->on('privacy_types');
            $table->foreign('join_date_type_id')->references('id')->on('privacy_types');
            $table->foreign('personality_type_id')->references('id')->on('privacy_types');
            $table->foreign('emotion_type_id')->references('id')->on('privacy_types');
            $table->foreign('learning_style_type_id')->references('id')->on('privacy_types');
            $table->foreign('friends_type_id')->references('id')->on('privacy_types');

            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privacy_types');
        Schema::dropIfExists('user_privacy');
    }
}
