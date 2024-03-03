<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function update(CustomerRequest $request)
    {
        Customer::where('customerNumber', $request['customerNumber'])
        ->update($request->only(['customerName', 'phone', 'postalCode']));

        return response()->json([
            'message' => "Successfully done!",
            'status' => 200
        ]);
    }
}
