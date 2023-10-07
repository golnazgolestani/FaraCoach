<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldScientificSupports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scientific_supports', function (Blueprint $table) {
            $table->integer('external_experience')->default(0);
            $table->integer('students_experience')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scientific_supports', function (Blueprint $table) {
            $table->dropColumn('external_experience');
            $table->tinyInteger('students_experience')->nullable()->change();
        });
    }
}
