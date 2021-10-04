<?php

namespace App\Collections;

use App\Models\Customer;
use ArrayIterator;
use Illuminate\Database\Eloquent\Collection;

/**
 * @method Customer|null first(callable $callback = null, $default = null)
 * @method Customer|null last(callable $callback = null, $default = null)
 * @method Customer|null pop()
 * @method Customer|null shift()
 * @method ArrayIterator|Customer[] getIterator()
 */
class CustomerEloquentCollection extends Collection
{
    public function someMethod(): self
    {
        // some logic

        return $this;
    }
}
