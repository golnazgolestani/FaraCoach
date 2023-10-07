<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_id')->nullable();
            $table->text('text')->nullable();
            $table->bigInteger('user_id_send')->nullable();
            $table->bigInteger('homework_id_answer')->nullable();
            $table->string('attach',250)->nullable();
            $table->string('type',100)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('date_fa',11)->nullable();
            $table->string('time_fa',10)->nullable();
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
        Schema::dropIfExists('homework');
    }
}
