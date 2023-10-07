<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title',250)->nullable();
            $table->string('shortlink',250)->unique();
            $table->text('content')->nullable();
            $table->string('file',250)->nullable();
            $table->string('permission',250)->nullable();
            $table->integer('clicks')->default(0);
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
        Schema::dropIfExists('documents');
    }
}
