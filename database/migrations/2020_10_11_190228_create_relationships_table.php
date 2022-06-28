<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $defaultGrantType = 4; // none

        Schema::create('relationships', function (Blueprint $table) {
            $table->tinyIncrements("id");
            $table->string("name"); 
            // pending_first_second, pending_second_first, friend, block_first_second, block_second_first
        });

        Schema::create('grant_types', function (Blueprint $table) {
            $table->tinyIncrements("id");
            $table->string("name"); 
            // grant_first_second, grant_second_first, both_granted, none
        });

        // Schema::create('relationships', function (Blueprint $table) {
        //     $table->id();
        //     $table->tinyInteger("type")->unsigned();
        //     $table->tinyInteger('grant_type')->unsigned();
        //     $table->timestamps();

        //     $table->foreign("type")->references("id")->on("relationships_types");
        //     $table->foreign("grant_type")->references("id")->on("grant_types");
        // });
        
        Schema::create('user_relationship', function (Blueprint $table) use($defaultGrantType) {
            $table->integer("user1_id")->unsigned();
            $table->integer("user2_id")->unsigned();
            $table->tinyInteger('relationship_id');
            $table->tinyInteger('grant_type')->unsigned()->default($defaultGrantType);
            $table->timestamps();

            $table->foreign("user1_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("user2_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("relationship_id")->references("id")->on("relationships");
            $table->foreign("grant_type")->references("id")->on("grant_types");

            $table->unique(['user1_id', 'user2_id'], 'unique_user_keys');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
        Schema::dropIfExists('grant_types');
        Schema::dropIfExists('relationships_types');
        Schema::dropIfExists('user_relationship');
    }
}
