<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteColumnsScholarshipPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholarship_payments', function (Blueprint $table) {
            $table->dropColumn('after_loan');
            $table->dropColumn('fi_scholarship');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholarship_payments', function (Blueprint $table) {
            $table->string('after_loan',20)->nullable();
            $table->string('fi_scholarship',20)->nullable();
        });
    }
}
