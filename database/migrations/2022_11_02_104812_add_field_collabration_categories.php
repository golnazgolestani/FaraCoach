<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldCollabrationCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collabration_details', function (Blueprint $table) {
            $table->unsignedBigInteger('collabration_categories_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collabration_details', function (Blueprint $table) {
           $table->dropColumn('collabration_categories_id');
        });
    }
}
