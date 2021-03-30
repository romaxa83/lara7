<?php

namespace App\Patterns\Decorator\Classes;

use App\Patterns\Decorator\Interfaces\OrderUpdateInterface;
use App\Patterns\Decorator\Models\Order;

//целевой класс
final class OrderUpdate implements OrderUpdateInterface
{
    public function run(Order $order, array $orderData): Order
    {
        \Debugbar::info('Base update');

        return $order;
    }
}
