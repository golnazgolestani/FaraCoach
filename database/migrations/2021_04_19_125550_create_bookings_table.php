<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('start_date',250)->nullable();
            $table->string('start_time',250)->nullable();
            $table->string('end_date',250)->nullable();
            $table->string('end_time',250)->nullable();
            $table->tinyInteger('duration_booking')->default(0);
            $table->tinyInteger('duration_relax')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('date_fa',11)->nullable();
            $table->string('time_fa',11)->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
