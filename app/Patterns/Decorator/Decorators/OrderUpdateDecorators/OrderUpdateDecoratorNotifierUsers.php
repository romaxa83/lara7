<?php


namespace App\Patterns\Decorator\Decorators\OrderUpdateDecorators;


class OrderUpdateDecoratorNotifierUsers extends OrderUpdateDecoratorAbstract
{
    protected function actionAfter()
    {
        \Debugbar::info("Notify user");
    }
}
