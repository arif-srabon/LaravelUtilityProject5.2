<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CerateUnionWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('union_wards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('division_id')->unsigned();
            $table->bigInteger('district_id')->unsigned();
            $table->bigInteger('thana_upazila_id')->unsigned();
            $table->bigInteger('city_corp_paurasava_id')->unsigned();
            $table->string('geo_code', 10);
            $table->string('name', 100);
            $table->string('name_bn', 300);
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
        Schema::dropIfExists('union_wards');
    }
}
