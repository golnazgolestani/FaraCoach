<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_interviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('level')->nullable();
            $table->tinyInteger('type_holding')->nullable();
            $table->string('cooperation',250)->nullable();
            $table->tinyInteger('motivation')->default(0);
            $table->tinyInteger('ability')->default(0);
            $table->tinyInteger('obligation')->default(0);
            $table->tinyInteger('impact')->default(0);
            $table->tinyInteger('score')->default(0);
            $table->string('description',250)->nullable();
            $table->unsignedBigInteger('insert_user_id')->nullable();
            $table->foreign('insert_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('scholarship_interviews');
    }
}
