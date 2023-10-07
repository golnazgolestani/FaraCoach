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
            $table->id();
            $table->integer('user_id_send');
            $table->string('subject',250)->nullable();
            $table->text('comment')->nullable();
            $table->integer('user_id_recieve')->nullable();
            $table->integer('message_id_answer')->nullable();
            $table->string('events_id',250)->nullable();
            $table->string('attach',250)->nullable();
            $table->string('date_fa',11)->nullable();
            $table->string('time_fa',11)->nullable();
            $table->tinyInteger('type')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
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
