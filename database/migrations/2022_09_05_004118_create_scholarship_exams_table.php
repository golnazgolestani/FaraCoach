<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_exams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->index();
            $table->string('result')->nullable();
            $table->tinyInteger('score')->default(0);
            $table->string('date_fa',10)->nullable();
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
        Schema::dropIfExists('scholarship_exams');
    }
}
