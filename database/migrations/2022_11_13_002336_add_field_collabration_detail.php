<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldCollabrationDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collabration_accepts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->index('collabration_detail_id');
            $table->unsignedBigInteger('collabration_detail_id')->nullable();
            //$table->foreign('collabration_detail_id')->references('id')->on('collabration_details')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collabration_accepts', function (Blueprint $table) {
            $table->dropIndex('collabration_detail_id');
            $table->dropColumn('collabration_detail_id');
        });
    }
}
