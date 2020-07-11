<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use App\Http\Controllers\Controller;

class LivewireController extends Controller
{
    public function testForm()
    {
        return view('admin.livewire.test-form');
    }
}
