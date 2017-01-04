<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_department', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('department_pin_no', 100)->unique();
            $table->string('departmen_name');
            $table->string('departmen_short_name', 60)->nullable()->unique();
            $table->bigInteger('division_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('upazilla_id')->nullable();
            $table->text('address');
            $table->string('contact_person_name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('mobile', 100)->nullable();
            $table->string('office_phone', 100);
            $table->string('center_logo')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('cc_department');
    }
}
