<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->string('fname',20)->nullable();
            $table->string('lname',20)->nullable();
            $table->string('email',100)->nullable();
            $table->string('tel',20)->nullable();
            $table->boolean('sex')->nullable();
            $table->string('type',50)->nullable();
            $table->string('education',20)->nullable();
            $table->string('city',20)->nullable();
            $table->string('image',250)->nullable();
            $table->text('biography')->nullable();
            $table->string('shortlink',50)->unique();
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
        Schema::dropIfExists('teachers');
    }
}
