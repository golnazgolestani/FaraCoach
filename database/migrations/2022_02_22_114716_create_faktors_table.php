<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaktorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->index()->nullable();
            $table->bigInteger('product_id')->index()->nullable();
            $table->string('type',50)->nullable();
            $table->string('date_createfaktor',11)->nullable();
            $table->string('date_faktor',11)->nullable();
            $table->string('fi',15)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('authority',100)->nullable();
            $table->string('description',50)->nullable();
            $table->string('date_pardakht',11)->nullable();
            $table->string('time_pardakht',10)->nullable();
            $table->bigInteger('checkout_id_pardakht ')->index()->nullable();



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
        Schema::dropIfExists('faktors');
    }
}
