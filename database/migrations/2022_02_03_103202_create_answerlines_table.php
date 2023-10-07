<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answerlines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->string('keyword',25)->nullable()->unique();
            $table->bigInteger('user_type')->unsigned()->nullable();
            $table->bigInteger('problemfollowup_id')->unsigned()->nullable();
            $table->text('followup_comment')->nullable();
            $table->string('text_message',250)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_type')->references('id')->on('user_types')->onDelete('cascade');
            $table->foreign('problemfollowup_id')->references('id')->on('problemfollowups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answerlines');
    }
}
