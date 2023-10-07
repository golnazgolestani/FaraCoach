<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('booking_id')->nullable();
            $table->string('subject',250)->nullable();
            $table->string('type_booking',50)->nullable();
            $table->tinyInteger('duration_booking')->default(2);
            $table->string('details',250)->nullable();
            $table->string('fi',20)->nullable();
            $table->string('off',20)->nullable();
            $table->string('type_discount',10)->nullable();
            $table->string('coupon',100)->nullable();
            $table->string('final_off',100)->nullable();
            $table->string('presession',250)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('result_coach',250)->nullable();
            $table->tinyInteger('score')->default(0);
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
        Schema::dropIfExists('reserves');
    }
}
