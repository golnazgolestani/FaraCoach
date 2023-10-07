<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username',200)->unique();
            $table->string('email',190)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('tel_verified')->default(0);
            $table->boolean('introduced_verified')->default(0);
            $table->string('password',250);
            $table->string('fname',100)->nullable();
            $table->string('lname',100)->nullable();
            $table->string('datebirth',11)->nullable();
            $table->string('father',30)->nullable();
            $table->string('codemelli',15)->nullable()->unique();
            $table->boolean('sex')->nullable();
            $table->string('tel',20)->nullable();
            $table->string('shenasname',20)->nullable();
            $table->string('born',30)->nullable();
            $table->string('education',20)->nullable();
            $table->string('reshteh',20)->nullable();
            $table->string('job',50)->nullable();
            $table->string('organization',100)->nullable();
            $table->string('jobside',30)->nullable();
            $table->string('state',20)->nullable();
            $table->string('city',20)->nullable();
            $table->string('address',250)->nullable();
            $table->string('personal_image',250)->nullable();
            $table->string('shenasnameh_image',250)->nullable();
            $table->string('cartmelli_image',250)->nullable();
            $table->string('education_image',250)->nullable();
            $table->string('resume',250)->nullable();
            $table->boolean('married')->nullable();
            $table->tinyInteger('type')->default('0');
            $table->string('resource',30)->nullable();
            $table->string('detailsresource',50)->nullable();
            $table->bigInteger('gettingknow')->nullable();
            $table->bigInteger('gettingknow_child')->nullable();
            $table->string('introduced',40)->nullable();
            $table->integer('followby_id')->nullable();
            $table->integer('followby_expert')->nullable();
            $table->integer('insert_user_id')->nullable();
            $table->string('telegram',50)->nullable();
            $table->string('instagram',50)->nullable();
            $table->string('linkedin',250)->nullable();
            $table->string('aboutme',250)->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->tinyInteger('status_coach')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
