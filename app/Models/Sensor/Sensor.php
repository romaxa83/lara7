<?php

namespace App\Models\Sensor;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $sensor_id
 * @property int $sensor_type_id
 * @property int $location_id
 */

class Sensor extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'sensor_id';

    protected $table = 'sensors_sensors';
}
