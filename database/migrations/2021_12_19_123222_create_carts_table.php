<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->index()->nullable();
            $table->bigInteger('product_id')->index()->nullable();
            $table->integer('capacity')->default(1);
            $table->string('fi',20)->nullable();
            $table->string('off',20)->nullable();
            $table->string('type_discount',10)->nullable();
            $table->string('coupon',100)->nullable();
            $table->string('final_off',100)->nullable();
            $table->string('type',100)->nullable();
            $table->tinyInteger('type_payment_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('date_fa',11)->nullable();
            $table->string('time_fa',11)->nullable();
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
        Schema::dropIfExists('carts');
    }
}
