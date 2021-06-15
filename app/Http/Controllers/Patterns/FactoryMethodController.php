<?php

namespace App\Http\Controllers\Patterns;

use App\Http\Controllers\Controller;
use App\Patterns\FactoryMethod\Classes\Forms\BootstrapDialogForm;

class FactoryMethodController extends Controller
{

    public function index()
    {
        $title = 'Фабричный метод';

        $result = (new BootstrapDialogForm())->render();

        return view('patterns.factory-method.index', compact('title', 'result'));
    }
}
