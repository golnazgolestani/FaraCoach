<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingscoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settingscores', function (Blueprint $table) {
            $table->id();
            $table->integer('signup')->default(1);
            $table->integer('tel_verified')->default(1);
            $table->integer('email_verified')->default(1);
            $table->integer('partsprofile')->default(1);
            $table->integer('introduced')->default(1);
            $table->integer('loginintroduced')->default(1);
            $table->integer('changeintroduced')->default(1);
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
        Schema::dropIfExists('settingscores');
    }
}
