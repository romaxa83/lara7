<?php

namespace App\Patterns\Composite\Orders\Models;

use App\Patterns\Composite\Orders\Interfaces\CompositeItemInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Ingredient extends Model implements CompositeItemInterface
{
    public $type = 'Ingredient';

    public function calcPrice(): float
    {
        if($this->price){
            \Debugbar::debug("[$this->id] {$this->type}::{$this->name} = {$this->price}");

            return $this->price;
        }

        $this->price = Arr::random([10, 20, 30, 40, 50, 60, 70, 80, 90]);
        \Debugbar::debug("[$this->id] {$this->type}::{$this->name} = {$this->price}");

        return $this->price;
    }
}
