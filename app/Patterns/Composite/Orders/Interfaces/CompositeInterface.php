<?php

namespace App\Patterns\Composite\Orders\Interfaces;

interface CompositeInterface extends CompositeItemInterface
{
    public function setChildItem(CompositeItemInterface $item);
}
