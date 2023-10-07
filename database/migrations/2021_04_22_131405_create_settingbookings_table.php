<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingbookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settingbookings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->tinyInteger('booking_duration')->default(0);
            $table->tinyInteger('relax_duration')->default(0);
            $table->string('fi_default')->default(0);
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
        Schema::dropIfExists('settingbookings');
    }
}
