<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->id();
            $table->integer('insert_user_id')->nullable();
            $table->text('recieve_user')->nullable();
            $table->text('comment')->nullable();
            $table->string('date_fa',11)->nullable();
            $table->string('time_fa',11)->nullable();
            $table->tinyInteger('type')->default(1);
            $table->string('code',250)->nullable();
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
        Schema::dropIfExists('sms');
    }
}
