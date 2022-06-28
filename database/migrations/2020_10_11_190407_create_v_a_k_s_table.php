<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVAKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vak_types', function (Blueprint $table) {
            $table->tinyIncrements("id");
            $table->string("type"); // visual, auditory, kinesthetic
        });

        Schema::create('vak_insights', function (Blueprint $table) {
            $table->tinyIncrements("id");
            $table->string('cover');
            $table->json('content'); // header, paragraphs, notes
        });


        Schema::create('user_vak', function (Blueprint $table) {
            $default_vak_value = 0;
            $table->increments("user_id");
            $table->tinyInteger("visual")->unsigned()->default($default_vak_value);
            $table->tinyInteger("auditory")->unsigned()->default($default_vak_value);
            $table->tinyInteger("kinesthetic")->unsigned()->default($default_vak_value);
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

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
        Schema::dropIfExists('vak_types');
        Schema::dropIfExists('user_vak');
    }
}
