<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->text('education_background')->nullable();
            $table->text('researches')->nullable();
            $table->text('certificates')->nullable();
            $table->text('experience')->nullable();
            $table->text('skills')->nullable();
            $table->text('documents')->nullable();
            $table->string('category',250)->nullable();
            $table->integer('count_meeting')->nullable();
            $table->integer('customer_satisfaction')->default(0);
            $table->integer('change_customer')->default(0);
            $table->integer('count_recommendation')->default(0);
            $table->integer('typecoach_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('fi',7)->default(0);
            $table->tinyInteger('type_holding')->nullable();
            $table->string('address',500)->nullable();
            $table->string('online_platform',250)->nullable();
            $table->string('tel',20)->nullable();
            $table->boolean('today_meeting')->default(0);
            $table->tinyInteger('introduction_discount')->default(0);
            $table->tinyInteger('extra_presence')->default(0);
            $table->boolean('confirm_faracoach')->default(0);
            $table->boolean('student_meeting')->default(0);
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
        Schema::dropIfExists('coaches');
    }
}
