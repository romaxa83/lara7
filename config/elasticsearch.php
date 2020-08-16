<?php

return [

    'hosts' => [
        [
            'host' => env('ELASTIC_HOST', '127.0.0.1'),
            'port' => env('ELASTIC_PORT', null),
            'user' => env('ELASTIC_USERNAME', null),
            'password' => env('ELASTIC_PASSWORD', null),
        ]
    ],
    // кол-во обращение
    'retries' => 1
];
