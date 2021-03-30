<?php

namespace App\Patterns\Decorator\Decorators\OrderUpdateDecorators;

use App\Patterns\Decorator\Interfaces\OrderUpdateInterface;
use App\Patterns\Decorator\Models\Order;

class OrderUpdateDecoratorLogger extends OrderUpdateDecoratorAbstract
{
    // какие-то действия до
    protected function actionBefore()
    {
        \Debugbar::info("Log before");
    }

    // какие-то действия после
    protected function actionAfter()
    {
        \Debugbar::info("Log after");
    }
}
