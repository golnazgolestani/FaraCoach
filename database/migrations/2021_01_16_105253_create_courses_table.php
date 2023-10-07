<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course',250);
            $table->string('shortlink',250)->unique();
            $table->string('image',250);
            $table->integer('teacher_id')->default(0);
            $table->tinyInteger('type')->default(1);
            $table->tinyInteger('duration')->default(0);
            $table->string('duration_date',20)->nullable();
            $table->tinyInteger('count_students')->default(0);
            $table->tinyInteger('coaches')->default(0);
            $table->tinyInteger('coachingbycoach')->default(0);
            $table->tinyInteger('coachingbyreference')->default(0);
            $table->tinyInteger('intership')->default(0);
            $table->string('start',20)->nullable();
            $table->string('end',20)->nullable();
            $table->string('course_days',250)->nullable();
            $table->string('course_times',10)->nullable();
            $table->text('infocourse')->nullable();
            $table->string('exam',100)->nullable();
            $table->string('certificate',100)->nullable();
            $table->string('fi',15)->nullable();
            $table->string('fi_off',15)->nullable();
            $table->tinyInteger('type_peymant_id')->nullable();
            $table->integer('prepayment')->default(0);
            $table->integer('peymant_off')->default(0);
            $table->string('images',250)->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('courses');
    }
}
