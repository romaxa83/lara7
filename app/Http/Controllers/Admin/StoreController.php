<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
       // $myLocation = [46.65581, 32.6178]; //kherson
        $myLocation = [42.3584300, -71.0597700]; // bostron

        $stores = Store::query()
            ->selectDistanceTo($myLocation)
            ->withinDistanceTo($myLocation, 1000000) // 1000km
            ->orderByDistanceTo($myLocation)
            ->paginate();

        return view('admin.store.index', ['stores' => $stores]);
    }
}
