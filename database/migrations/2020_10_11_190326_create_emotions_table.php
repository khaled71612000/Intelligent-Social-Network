<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('emotions', function (Blueprint $table) {
        //     $table->tinyIncrements("id");
        //     $table->string("type");
        //     // Happy, Sad, Neutral, Fear, Angry
        // });

        // Each tinyInteger represent number of messages/analysis-results
        // that indicates a specific type of emotions.
        // These default fields will be cleared on daily-bases
        Schema::create('user_emotion', function (Blueprint $table) {
            $default_emotion_value = 0;

            $table->increments("user_id");
            $table->tinyInteger("happy")->unsigned()->default($default_emotion_value);
            $table->tinyInteger("sad")->unsigned()->default($default_emotion_value);
            $table->tinyInteger("neutral")->unsigned()->default(1);
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
        Schema::dropIfExists('user_emotion');
        // Schema::dropIfExists('emotions');
    }
}
