<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackCoachingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_coachings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('booking_id')->nullable();
            $table->tinyInteger('sense')->nullable();
            $table->tinyInteger('expectations')->nullable();
            $table->tinyInteger('trust')->nullable();
            $table->tinyInteger('listen')->nullable();
            $table->tinyInteger('emotions')->nullable();
            $table->tinyInteger('failure_provide')->nullable();
            $table->tinyInteger('time_management')->nullable();
            $table->tinyInteger('proper_feedback')->nullable();
            $table->tinyInteger('drawing_goals')->nullable();
            $table->tinyInteger('check_dimensions')->nullable();
            $table->tinyInteger('solution_evaluation')->nullable();
            $table->tinyInteger('homework')->nullable();
            $table->tinyInteger('summary_comments')->nullable();
            $table->string('best_offer',250)->nullable();
            $table->string('effective_criticism',250)->nullable();
            $table->string('achievement',250)->nullable();
            $table->string('self_awareness',250)->nullable();
            $table->string('challenges',250)->nullable();
            $table->string('opportunities_you',250)->nullable();
            $table->string('future_expectations',250)->nullable();
            $table->string('suggestions_progress',250)->nullable();
            $table->boolean('satisfaction')->nullable();
            $table->string('comment',250)->nullable();
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
        Schema::dropIfExists('feedback_coachings');
    }
}
