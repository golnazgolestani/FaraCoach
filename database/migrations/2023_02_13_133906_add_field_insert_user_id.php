<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldInsertUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faktors', function (Blueprint $table) {
            $table->unsignedBigInteger('insert_user_id')->nullable();
            $table->foreign('insert_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faktors', function (Blueprint $table) {
            $table->dropColumn('insert_user_id');
        });
    }
}
