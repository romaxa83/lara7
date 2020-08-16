<?php

namespace App\Models\Sensor;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $location_id
 * @property string $customer
 * @property string $department
 * @property string $building_name
 * @property int $room
 * @property int $floor
 * @property string $location_on_floor
 * @property string $latitude
 * @property string $longitude
 */

class Location extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'location_id';

    protected $table = 'sensors_location';
}
