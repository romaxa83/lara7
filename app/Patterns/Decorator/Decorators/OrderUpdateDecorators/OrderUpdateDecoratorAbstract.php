<?php

namespace App\Patterns\Decorator\Decorators\OrderUpdateDecorators;

use App\Patterns\Decorator\Interfaces\OrderUpdateInterface;
use App\Patterns\Decorator\Models\Order;

abstract class OrderUpdateDecoratorAbstract implements OrderUpdateInterface
{
    /** @var OrderUpdateInterface */
    protected $decoratorObject;

    /**
     * OrderUpdateDecoratorAbstract constructor.
     * @param OrderUpdateInterface $decoratorObject
     */
    public function __construct(OrderUpdateInterface $decoratorObject)
    {
        $this->decoratorObject = $decoratorObject;
    }

    public function run(Order $order, array $orderData): Order
    {
        $this->actionBefore();

        $this->actionMain($order, $orderData);

        $this->actionAfter();

        return $order;
    }
    // какие-то действия до
    protected function actionBefore()
    {

    }
    // основной функционал
    protected function actionMain($order, $orderData): Order
    {
        return $this->decoratorObject->run($order, $orderData);
    }
    // какие-то действия после
    protected function actionAfter()
    {

    }
}
