<?php

namespace App\Http\Controllers\Patterns;

use App\Models\Customer;
use App\Models\Region;
use App\Http\Controllers\Controller;
use App\Models\User\User;
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
use App\Patterns\Strategy\SalaryManager;
use Carbon\Carbon;

class StrategyController extends Controller
{
    public function index()
    {
        $name = 'Стратегия';

        $period = [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth(),
        ];

//        factory(User::class, 10)->create();
        $users = User::all();

        $data = (new SalaryManager($period, $users))->handle();


        return view('patterns.strategy.index', ['data' => $data]);
    }
}
