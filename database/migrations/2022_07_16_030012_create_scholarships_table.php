<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->tinyInteger('target')->nullable();
            $table->boolean('confirm_target')->default(0);
            $table->string('types',250)->nullable();
            $table->boolean('confirm_types')->default(0);
            $table->tinyInteger('gettingknow')->nullable();
            $table->boolean('confirm_gettingknow')->default(0);
            $table->string('description',250)->nullable();
            $table->string('scientific',250)->nullable();
            $table->string('executive',250)->nullable();
            $table->string('introduce',250)->nullable();
            $table->string('introduce',250)->nullable();
            $table->string('cooperation',250)->nullable();
            $table->boolean('confirm_cooperation')->default(0);
            $table->tinyInteger('applicant')->nullable();
            $table->boolean('confirm_applicant')->default(0);
            $table->string('resume',250)->nullable();
            $table->boolean('confirm_resume')->default(0);
            $table->boolean('confirm_webinar')->default(0);
            $table->boolean('confirm_exam')->default(0);
            $table->string('introductionletter',100)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('trackingcode',30)->nullable();
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
        Schema::dropIfExists('scholarships');
    }
}
