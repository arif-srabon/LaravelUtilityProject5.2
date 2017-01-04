<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcMaritusStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_maritus_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10);
            $table->string('name', 100);
            $table->string('name_bn', 300);
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->nullable();
            $table->integer('weight')->unsigned();
            $table->tinyInteger('is_default');
            $table->tinyInteger('is_active');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cc_maritus_status');
    }
}
