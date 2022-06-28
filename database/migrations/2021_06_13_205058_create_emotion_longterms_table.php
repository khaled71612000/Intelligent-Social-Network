<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmotionLongtermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emotion_longterm', function (Blueprint $table) {
            $default_emotion_value = 0;

            $table->integer("user_id");
            $table->tinyInteger("happy")->unsigned()->default($default_emotion_value);
            $table->tinyInteger("sad")->unsigned()->default($default_emotion_value);
            $table->tinyInteger("neutral")->unsigned()->default($default_emotion_value);
            $table->tinyInteger("fear")->unsigned()->default($default_emotion_value);
            $table->tinyInteger("angry")->unsigned()->default($default_emotion_value);
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
    
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emotion_longterm');
    }
}
