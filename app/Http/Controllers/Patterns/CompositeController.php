<?php

namespace App\Http\Controllers\Patterns;

use App\Http\Controllers\Controller;
use App\Patterns\Composite\Orders\OrderPriceComposite;

class CompositeController extends Controller
{
    public function index()
    {
        $title = 'Композиция';

        $order = new OrderPriceComposite();
        $order->run();

        return view('patterns.composite.index', compact('title'));
    }
}
