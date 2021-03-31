<?php

namespace App\Patterns\Decorator;

use App\Patterns\Decorator\Classes\OrderUpdateWeb;
use App\Patterns\Decorator\Interfaces\OrderUpdateInterface;
use App\Patterns\Decorator\Models\Order;

// пример реазизации стека декораторов
class DecoratorApp
{
    public function run()
    {
        $order = new Order();
        $orderData = [];
        $updateOrderObj = $this->getUpdateOrderObj();

        $updateOrderObj->run($order, $orderData);
    }

    private function getUpdateOrderObj(): OrderUpdateInterface
    {
        //создаем наш базовый класс и оборачиваем его в декоратор для логирования
        // простой вариант
//        return new OrderUpdateDecoratorLogger(new OrderUpdate());

        // вложеные декораторы
//        $orderUpdateLogger = new OrderUpdateDecoratorLogger(new OrderUpdate());
//        $orderUpdateNotifierManagers = new OrderUpdateDecoratorNotifierManagers($orderUpdateLogger);
//        return new OrderUpdateDecoratorNotifierUsers($orderUpdateNotifierManagers);

        return new OrderUpdateWeb();
    }
}
