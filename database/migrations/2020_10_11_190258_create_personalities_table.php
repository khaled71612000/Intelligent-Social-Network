<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personality_types', function (Blueprint $table) {
            $table->tinyIncrements("id");
            $table->string("type"); // INTJ, ENTJ .. etc
        });

        Schema::create('personality_insights', function (Blueprint $table) {
            $table->tinyInteger("personality_id")->unsigned()->primary();
            $table->string('cover');
            $table->json("content"); // contain headers, paragraphs, notes(strength & weakness..)

            $table->foreign("personality_id")->references("id")->on("personality_types");
        });

        Schema::create('relationship_issues', function (Blueprint $table) {
            $table->tinyInteger("personality1_id")->unsigned();
            $table->tinyInteger("personality2_id")->unsigned();
            $table->string('cover');
            $table->json("content"); // contain headers, paragraphs, notes(strength & weakness..)

            $table->foreign("personality1_id")->references("id")->on("personality_types");
            $table->foreign("personality2_id")->references("id")->on("personality_types");
            $table->primary(['personality1_id', 'personality2_id']);
        });

        // handle json field in Model : protected $casts = [ 'fieldName' => 'array ];

        Schema::create('personalities', function (Blueprint $table) {
            $default_personality_value = 0;
            $table->increments("user_id");
            $table->tinyInteger("INTJ")->unsigned()->default($default_personality_value);
            $table->tinyInteger("INFJ")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ENTP")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ENFP")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ENTJ")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ESTJ")->unsigned()->default($default_personality_value);
            $table->tinyInteger("INTP")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ISTP")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ENFJ")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ESFJ")->unsigned()->default($default_personality_value);
            $table->tinyInteger("INFP")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ISFP")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ISTJ")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ISFJ")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ESTP")->unsigned()->default($default_personality_value);
            $table->tinyInteger("ESFP")->unsigned()->default($default_personality_value);

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
        Schema::dropIfExists('personalities');
        Schema::dropIfExists('relationship_issues');
        Schema::dropIfExists('personality_insights');
        Schema::dropIfExists('personality_types');
    }
}
