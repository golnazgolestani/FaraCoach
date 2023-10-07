<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollabrationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collabration_details', function (Blueprint $table) {
            $table->id();
            $table->string('title',200)->nullable();
            $table->string('value',100)->nullable();
            $table->string('max',20)->nullable();
            $table->boolean('status',20)->default(1);
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
        Schema::dropIfExists('collabration_details');
    }
}
