<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('event',150)->nullable();
            $table->string('shortlink',150)->nullable();
            $table->text('event_text')->nullable();
            $table->text('description')->nullable();
            $table->string('image',250)->nullable();
            $table->tinyInteger('capacity')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->string('address',250)->nullable();
            $table->text('heading')->nullable();
            $table->string('contacts',250)->nullable();
            $table->string('faq',250)->nullable();
            $table->string('video',250)->nullable();
            $table->string('links',250)->nullable();
            $table->string('expire_date',11)->nullable();
            $table->string('start_date',11)->nullable();
            $table->string('end_date',11)->nullable();
            $table->string('start_time',8)->nullable();
            $table->string('end_time',8)->nullable();
            $table->string('duration',100)->nullable();
            $table->string('options',250)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('insert_user')->nullable();
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
        Schema::dropIfExists('events');
    }
}
