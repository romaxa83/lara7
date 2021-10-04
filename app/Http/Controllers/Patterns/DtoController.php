<?php

namespace App\Http\Controllers\Patterns;

use App\Http\Controllers\Controller;
use App\Patterns\Delegation\AppMessenger;

class DtoController extends Controller
{

    public function index()
    {
        $title = 'DTO';

        return view('patterns.dto.index', compact('title'));
    }
}
