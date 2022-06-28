<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("chat_id")->unsigned();
            $table->integer("user_id")->unsigned();
            // $table->integer("word_count")->unsigned(); // Check normalization: 3NF
            $table->text("message");
            $table->string("url", 1000)->nullable();
            $table->string("media")->nullable();
            $table->boolean("read")->default(0);
            $table->timestamp('created_at')->useCurrent();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("chat_id")->references("id")->on("chat")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
