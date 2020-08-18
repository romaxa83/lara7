<?php

namespace App\Elasticsearch;

class SensorIndex
{
    public function getSchema()
    {
        return [
            'index' => 'sensor_data',
            'body' => [
                'index_patterns' => ['sensor_data*'],
                'settings' => [
                    'number_of_replicas' => '1',
                    'number_of_shards' => '5'
                ],
                'mappings' => [
                    'doc' => [
                        'properties' => [
                            'sensorId' => ['type' => 'integer'],
                            'sensorType' => [
                                'type' => 'keyword',
                                'fields' => ['analyzed' => ['type' => 'text']]
                            ],
                            'customer' => [
                                'type' => 'keyword',
                                'fields' => ['analyzed' => ['type' => 'text']]
                            ],
                            'department' => [
                                'type' => 'keyword',
                                'fields' => ['analyzed' => ['type' => 'text']]
                            ],
                            'buildingName' => [
                                'type' => 'keyword',
                                'fields' => ['analyzed' => ['type' => 'text']]
                            ],
                            'room' => [
                                'type' => 'keyword',
                                'fields' => ['analyzed' => ['type' => 'text']]
                            ],
                            'floor' => [
                                'type' => 'keyword',
                                'fields' => ['analyzed' => ['type' => 'text']]
                            ],
                            'locationOnFloor' => [
                                'type' => 'keyword',
                                'fields' => ['analyzed' => ['type' => 'text']]
                            ],
                            'location' => ['type' => 'geo_point'],
                            'time' => ['type' => 'date'],
                            'reading' => ['type' => 'double'],
                        ]
                    ]
                ],
            ]
        ];
    }
}
