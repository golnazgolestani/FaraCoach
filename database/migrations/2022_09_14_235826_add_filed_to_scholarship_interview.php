<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiledToScholarshipInterview extends Migration
{
    /**
     * Run the migrations.
     *w
     * @return void
     */
    public function up()
    {
        Schema::table('scholarship_interviews', function (Blueprint $table) {
            $table->tinyInteger('validity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholarship_interviews', function (Blueprint $table) {
            $table->dropColumn('validity');
        });
    }
}
