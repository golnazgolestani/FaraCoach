<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->index()->nullable();
            $table->bigInteger('product_id')->index()->nullable();
            $table->integer('capacity')->default(1);
            $table->string('fi',20)->nullable();
            $table->string('off',20)->nullable();
            $table->string('coupon',100)->nullable();
            $table->string('final_off',100)->nullable();
            $table->string('type',100)->nullable();
            $table->string('payment_type',100)->nullable();
            $table->integer('prepaymant')->nullable();
            $table->tinyInteger('darsadTakhkfif')->nullable();
            $table->string('takhfif_naghdi',20)->nullable();
            $table->tinyInteger('baghimandeh_batakhfif')->nullable();
            $table->tinyInteger('tedad_ghest')->nullable();
            $table->string('fi_ghest',20)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('date_fa',11)->nullable();
            $table->string('time_fa',11)->nullable();
            $table->string('description',100)->nullable();
            $table->string('authority',250)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
