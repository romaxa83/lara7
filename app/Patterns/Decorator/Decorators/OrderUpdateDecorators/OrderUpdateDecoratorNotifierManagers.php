<?php


namespace App\Patterns\Decorator\Decorators\OrderUpdateDecorators;


class OrderUpdateDecoratorNotifierManagers extends OrderUpdateDecoratorAbstract
{
    protected function actionAfter()
    {
        \Debugbar::info("Notify manager");
    }
}
