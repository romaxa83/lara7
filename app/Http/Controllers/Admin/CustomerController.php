<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Region;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = \Cache::get('customers');

        // To find the customers for a specific region:
        $regions = Region::all();
        $customers = Customer::query()
            ->inRegion(Region::where('name', 'The Prairies')->first())
            ->get();


        $result = \Cache::get('customers');



        // To find the region from a random customer:
        // $customers = Customer::inRandomOrder()->take(1)->get();
        // $regions = Region::hasCustomer($customers->first())->get();

        return view('admin.customer.index', [
            'customers' => $customers,
            'regions' => $regions,
        ]);
    }
}
