<?php

use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorLogger;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierManagers;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierUsers;

return [
    'fromWeb' => [
        [
            'name' => 'log',
            'enabled' => 1,
            'decorator_class' => OrderUpdateDecoratorLogger::class,
        ],
        [
            'name' => 'notifyUser',
            'enabled' => 0,
            'decorator_class' => OrderUpdateDecoratorNotifierUsers::class,
        ],
        [
            'name' => 'notifyManagers',
            'enabled' => 1,
            'decorator_class' => OrderUpdateDecoratorNotifierManagers::class,
        ],
    ],

    'fromAdmin' => [
        [
            'name' => 'log',
            'enabled' => 1,
            'decorator_class' => OrderUpdateDecoratorLogger::class,
        ],
        [
            'name' => 'notifyUser',
            'enabled' => 1,
            'decorator_class' => OrderUpdateDecoratorNotifierUsers::class,
        ]
    ]
];
