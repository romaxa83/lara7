<?php

namespace App\Patterns\Decorator\Interfaces;

use App\Patterns\Decorator\Models\Order;

interface OrderUpdateInterface
{
    // $orderData - данные которые нужно изменить в order
    public function run(Order $order, array $orderData): Order;
}
