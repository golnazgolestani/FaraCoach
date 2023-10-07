<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('coupon',50)->nullable();
            $table->tinyInteger('discount')->default(0);
            $table->tinyInteger('type_discount')->nullable();
            $table->string('expire_date',11)->nullable();
            $table->string('product',11)->nullable();
            $table->string('category_product',100)->nullable();
            $table->string('type',20)->nullable();
            $table->tinyInteger('limit_user')->default(0);
            $table->integer('count')->default(-1);
            $table->boolean('flag')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
