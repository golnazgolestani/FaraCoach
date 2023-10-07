<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('title',200)->nullable();
            $table->string('shortlink',250)->nullable();
            $table->text('content')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('status_comment')->default(1);
            $table->string('image')->nullable();
            $table->integer('categorypost_id')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
