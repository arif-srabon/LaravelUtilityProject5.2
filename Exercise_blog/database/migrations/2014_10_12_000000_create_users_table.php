<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('full_name_en');
            $table->string('full_name_bn');
//            $table->string('password_confirmation');
            $table->string('user_photo')->nullable();
            $table->string('user_sign')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('official_email')->unique();
            $table->string('blood_group')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('mobile',150)->nullable();
            $table->string('passport',150)->nullable();
            $table->string('national_id',150)->nullable();
            $table->integer('marital_status_id',false,true)->nullable()->unsignd();

            $table->string('permanent_house_road')->nullable();
            $table->string('permanent_village')->nullable();
            $table->integer('permanent_division')->nullable();
            $table->integer('permanent_district')->nullable();
            $table->integer('permanent_upzilla')->nullable();
            $table->integer('permanent_ward')->nullable();
            $table->integer('permanent_postcode')->nullable();

            $table->string('present_house_road')->nullable();
            $table->string('present_village')->nullable();
            $table->integer('present_division')->nullable();
            $table->integer('present_district')->nullable();
            $table->integer('present_upzilla')->nullable();
            $table->integer('present_ward')->nullable();
            $table->integer('present_postcode')->nullable();


            $table->integer('department_id', false, true)->nullable()->unsigned();
            $table->integer('designation_id', false, true)->nullable()->unsigned();
            $table->tinyInteger('status', false, true);
            $table->mediumText('permissions')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->bigInteger('created_by')->nullable()->unsigned();
            $table->bigInteger('updated_by')->nullable()->unsigned();

            $table->rememberToken();
            // We'll need to ensure that MySQL uses the InnoDB engine to
            // support the indexes, other engines aren't affected.
            $table->engine = 'InnoDB';
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
        Schema::drop('users');
    }
}
