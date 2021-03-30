<?php

namespace App\Http\Controllers\Patterns;

use App\Models\Customer;
use App\Models\Region;
use App\Http\Controllers\Controller;
use App\Patterns\Adapter\Classes\MediaLibraryOld;
use App\Patterns\Adapter\Interfaces\MediaLibraryInterface;
use App\Patterns\Composite\Orders\OrderPriceComposite;
use App\Patterns\Decorator\Classes\OrderUpdate;
use App\Patterns\Decorator\Classes\OrderUpdateWeb;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorLogger;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierManagers;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierUsers;
use App\Patterns\Decorator\Interfaces\OrderUpdateInterface;
use App\Patterns\Decorator\Models\Order;

class DecoratorController extends Controller
{
    public function index()
    {
        $name = 'Декоратор';


        $order = new Order();
        $orderData = [];
        $updateOrderObj = $this->getUpdateOrderObj();

        $updateOrderObj->run($order, $orderData);

        return view('patterns.decorator.index');
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
