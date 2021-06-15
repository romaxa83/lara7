<?php

namespace App\Http\Controllers\Patterns;

use App\Http\Controllers\Controller;
use App\Patterns\Decorator\DecoratorAppSettings;

class DecoratorController extends Controller
{
    public function index()
    {
        $title = 'Декоратор';

//        (new DecoratorApp())->run();
        (new DecoratorAppSettings())->run();

        return view('patterns.decorator.index', compact('title'));
    }
}
