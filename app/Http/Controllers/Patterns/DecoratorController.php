<?php

namespace App\Http\Controllers\Patterns;

use App\Models\Customer;
use App\Models\Region;
use App\Http\Controllers\Controller;
use App\Patterns\Adapter\Classes\MediaLibraryOld;
use App\Patterns\Adapter\Interfaces\MediaLibraryInterface;
use App\Patterns\Composite\Orders\OrderPriceComposite;
use App\Patterns\Decorator\Classes\OrderUpdate;
use App\Patterns\Decorator\Classes\OrderUpdateWeb;
use App\Patterns\Decorator\DecoratorApp;
use App\Patterns\Decorator\DecoratorAppSettings;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorLogger;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierManagers;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierUsers;
use App\Patterns\Decorator\Interfaces\OrderUpdateInterface;
use App\Patterns\Decorator\Models\Order;

class DecoratorController extends Controller
{
    public function index()
    {
        $name = 'Декоратор';

//        (new DecoratorApp())->run();
        (new DecoratorAppSettings())->run();

        return view('patterns.decorator.index');
    }
}
