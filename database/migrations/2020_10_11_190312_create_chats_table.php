<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->integer("n_messages")->unsigned()->default(0);
            $table->integer("n_messages_not_analyzed")->unsigned()->default(0);
            $table->timestamps();
        });

        Schema::create('user_chat', function (Blueprint $table) {
            $table->bigIncrements("chat_id");
            $table->integer("user1_id")->unsigned();
            $table->integer("user2_id")->unsigned();

            $table->foreign("chat_id")->references("id")->on("chat")->onDelete("cascade");
            $table->foreign("user1_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("user2_id")->references("id")->on("users")->onDelete("cascade");
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
        Schema::dropIfExists('user_chat');
    }
}
