<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('fi',20)->nullable();
            $table->tinyInteger('loan')->nullable();
            $table->string('after_loan',20)->nullable();
            $table->tinyInteger('score')->nullable();
            $table->string('fi_scholarship',20)->nullable();
            $table->string('fi_final',20)->nullable();
            $table->string('pre_payment',20)->nullable();
            $table->string('remaining',20)->nullable();
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
        Schema::dropIfExists('scholarship_payments');
    }
}
