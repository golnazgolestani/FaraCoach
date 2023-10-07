<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('fname','100')->nullable();
            $table->string('lname','100')->nullable();
            $table->string('email','150')->nullable();
            $table->string('tel','21')->nullable();
            $table->string('resource','100')->nullable();
            $table->string('options','250')->nullable();
            $table->string('instagram','250')->nullable();
            $table->string('introductioncoaching','100')->nullable();
            $table->string('attendingcoaching','100')->nullable();
            $table->string('coachingservices','100')->nullable();
            $table->integer('mention')->nullable();
            $table->string('resultoptions','250')->nullable();
            $table->string('introduced','20')->nullable();
            $table->tinyInteger('count')->nullable();
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
        Schema::dropIfExists('land_pages');
    }
}
