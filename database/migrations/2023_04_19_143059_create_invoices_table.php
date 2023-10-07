<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('fi',15)->nullable();
            $table->string('off',15)->nullable();
            $table->tinyInteger('score')->nullable();
            $table->string('fi_final',15)->nullable();
            $table->string('pre_payment',15)->nullable();
            $table->string('remaining',15)->nullable();
            $table->tinyInteger('count_installment')->nullable();
            $table->string('fi_installment',15)->nullable();
            $table->string('date_installment',15)->nullable();
            $table->string('expire_date',11)->nullable();
            $table->string('date_fa',11)->nullable();
            $table->string('time_fa',11)->nullable();
            $table->unsignedBigInteger('insert_user_id')->nullable();
            $table->foreign('insert_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('invoices');
    }
}
