<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors_sensors', function (Blueprint $table) {
            $table->increments('sensor_id');
            $table->integer('sensor_type_id');
            $table->integer('location_id');
        });
    }

    /**
     * Reverse themigrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors_sensors');
    }
}

