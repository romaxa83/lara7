<?php

namespace App\Models\Sensor;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $sensor_type_id
 * @property string $sensor_type
 */

class SensorType extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'sensor_type_id';

    protected $table = 'sensors_sensor';
}

