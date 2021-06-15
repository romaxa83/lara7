<?php

namespace App\Http\Controllers\Patterns;

use App\Http\Controllers\Controller;
use App\Patterns\StaticFactory\StaticFactory;

class StaticFactoryController extends Controller
{

    public function index()
    {
        $title = 'Статическая фабрика';

        $appMailMessenger = StaticFactory::build('email');
        $appSmsMessenger = StaticFactory::build('sms');

        \Debugbar::info($appMailMessenger, $appSmsMessenger);

        return view('patterns.static-factory.index', compact('title'));
    }
}
