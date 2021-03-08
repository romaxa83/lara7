<?php

namespace App\Patterns\Composite\Orders\Models;

use App\Patterns\Composite\Orders\Interfaces\CompositeInterface;
use App\Patterns\Composite\Orders\Traits\CompositeTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements CompositeInterface
{
    use CompositeTrait;

    public $type = 'Product';
}
