<?php

use App\Models\Customer;
use App\Models\Region;
use App\Models\Sensor\Location;
use App\Models\Sensor\Sensor;
use App\Models\Sensor\SensorType;
use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    public function run()
    {
        Sensor::truncate();
        Location::truncate();
        SensorType::truncate();

        $this->seedSensorType();
        $this->seedSensorLocation();
        $this->seedRelation();
    }

    public function seedSensorType()
    {
        $model = new SensorType();
        $model->sensor_type = 'Температура';
        $model->save();

        $model_2 = new SensorType();
        $model_2->sensor_type = 'Влажность';
        $model_2->save();
    }

    public function seedSensorLocation()
    {
        $model = new Location();
        $model->customer = 'Abc Labs';
        $model->department = 'R & D';
        $model->building_name = '222 Broadway';
        $model->room = '101';
        $model->floor = '1';
        $model->location_on_floor = 'C-101';
        $model->latitude = '40.710936';
        $model->longitude = '-74.008500';
        $model->save();

        $model_2 = new Location();
        $model_2->customer = 'Abc Labs';
        $model_2->department = 'Operations';
        $model_2->building_name = 'One World Trade Center';
        $model_2->room = '201';
        $model_2->floor = '2';
        $model_2->location_on_floor = '0-201';
        $model_2->latitude = '40.712515';
        $model_2->longitude = '-74.015386';
        $model_2->save();

        $model_3 = new Location();
        $model_3->customer = 'Abc Labs';
        $model_3->department = 'Operations';
        $model_3->building_name = '1 Newark St.';
        $model_3->room = '101';
        $model_3->floor = '1';
        $model_3->location_on_floor = '0-382';
        $model_3->latitude = '40.736370';
        $model_3->longitude = '-74.028755';
        $model_3->save();

        $model_4 = new Location();
        $model_4->customer = 'Abc Labs';
        $model_4->department = 'Operations';
        $model_4->building_name = '15 Exchange Pl.';
        $model_4->room = '201';
        $model_4->floor = '2';
        $model_4->location_on_floor = '0-293';
        $model_4->latitude = '40.715856';
        $model_4->longitude = '-74.033391';
        $model_4->save();
    }

    public function seedRelation()
    {
        foreach ($this->getRelationData() as $item){
            $model = new Sensor();
            $model->sensor_type_id = $item['sensor_type_id'];
            $model->location_id = $item['location_id'];
            $model->save();
        }
    }

    public function getRelationData()
    {
        return [
            [
                'sensor_type_id' => 1,
                'location_id' =>  1
            ],
            [
                'sensor_type_id' => 1,
                'location_id' =>  2
            ],
            [
                'sensor_type_id' => 1,
                'location_id' =>  3
            ],
            [
                'sensor_type_id' => 1,
                'location_id' =>  4
            ],
            [
                'sensor_type_id' => 2,
                'location_id' =>  1
            ],
            [
                'sensor_type_id' => 2,
                'location_id' =>  2
            ],
            [
                'sensor_type_id' => 2,
                'location_id' =>  3
            ],
            [
                'sensor_type_id' => 2,
                'location_id' =>  4
            ],
        ];
    }
}
