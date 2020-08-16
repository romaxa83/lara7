<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors_location', function (Blueprint $table) {
            $table->increments('location_id');
            $table->string('customer');
            $table->string('department');
            $table->string('building_name');
            $table->integer('room');
            $table->integer('floor');
            $table->string('location_on_floor');
            $table->string('latitude');
            $table->string('longitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors_location');
    }
}
