<?php

namespace App\Patterns\Composite\Orders\Traits;

use App\Patterns\Composite\Orders\Interfaces\CompositeItemInterface;

trait CompositeTrait
{
    private $compositeItems = [];

    public function setChildItem(CompositeItemInterface $item)
    {
        $this->compositeItems[] = $item;
    }

    public function calcPrice(): float
    {
        if($this->price)  return $this->price;

        $this->price = 0;
        foreach($this->compositeItems as $compositeItem){
            $this->price += $compositeItem->calcPrice();
        }

        \Debugbar::debug("[$this->id] {$this->type}::{$this->name} = {$this->price}");

        return $this->price;
    }
}
