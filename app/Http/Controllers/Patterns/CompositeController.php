<?php

namespace App\Http\Controllers\Patterns;

use App\Models\Customer;
use App\Models\Region;
use App\Http\Controllers\Controller;
use App\Patterns\Composite\Orders\OrderPriceComposite;

class CompositeController extends Controller
{
    public function index()
    {
        $order = new OrderPriceComposite();
        $order->run();

        return view('patterns.composite.index');
    }
}
