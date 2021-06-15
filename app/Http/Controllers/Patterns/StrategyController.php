<?php

namespace App\Http\Controllers\Patterns;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Patterns\Strategy\SalaryManager;
use Carbon\Carbon;

class StrategyController extends Controller
{
    public function index()
    {
        $title = 'Стратегия';

        $period = [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth(),
        ];

//        factory(User::class, 10)->create();
        $users = User::all();

        $data = (new SalaryManager($period, $users))->handle();


        return view('patterns.strategy.index', [
            'data' => $data,
            'title' => $title,
        ]);
    }
}
