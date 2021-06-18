<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function list()
    {
//        $customers = \Cache::get('customers');
//
//        if(null == $customers){
//            sleep(2);
//            $customers = Customer::all();
//            \Cache::set('customers', $customers, 5);
//        }
//
//        return CustomerResource::collection($customers);

        return \Cache::remember('customers', 5, function (){
            $customers = Customer::all();

            return CustomerResource::collection($customers);
        });
    }
}
