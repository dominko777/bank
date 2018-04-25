<?php

namespace App\Http\Controllers\API;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->input('name');
        $customer->cnp = (bool) $request->input('cnp');
        $customer->save();
        return response()->json([
            'customerId' => $customer->id,
        ], 201);
    }
}
