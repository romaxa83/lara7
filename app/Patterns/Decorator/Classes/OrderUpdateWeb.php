<?php

namespace App\Patterns\Decorator\Classes;

use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorLogger;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierManagers;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierUsers;
use App\Patterns\Decorator\Interfaces\OrderUpdateInterface;
use App\Patterns\Decorator\Models\Order;

class OrderUpdateWeb implements OrderUpdateInterface
{
    public function run(Order $order, array $orderData): Order
    {
        $updateDecorators = $this->createStackDecorators();

        return $updateDecorators->run($order, $orderData);
    }

    private function createStackDecorators()
    {
        $orderUpdateLogger = new OrderUpdateDecoratorLogger(new OrderUpdate());
        $orderUpdateNotifierManagers = new OrderUpdateDecoratorNotifierManagers($orderUpdateLogger);

        return new OrderUpdateDecoratorNotifierUsers($orderUpdateNotifierManagers);
    }
}
