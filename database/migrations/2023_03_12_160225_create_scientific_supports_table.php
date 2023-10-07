<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScientificSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scientific_supports', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('level')->nullable();
            $table->tinyInteger('experience')->nullable();
            $table->text('certificates')->nullable();
            $table->text('resume')->nullable();
            $table->text('educational_activity')->nullable();
            $table->tinyInteger('know_icdl')->nullable();
            $table->string('free_time')->nullable();
            $table->string('blooming_experience')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('scientific_supports');
    }
}
