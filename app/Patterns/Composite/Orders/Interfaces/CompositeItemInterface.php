<?php

namespace App\Patterns\Composite\Orders\Interfaces;

// каждый элемент в цепочке должен реализовать данный интерфейс
interface CompositeItemInterface
{
    public function calcPrice(): float;
}
