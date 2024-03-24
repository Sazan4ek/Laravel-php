<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class AuthApiCustomerController extends Controller
{
    public function login(CustomerRequest $request)
    {
        $customer = Customer::where('customerNumber', $request['customerNumber'])->first();

        $token = $customer->createToken($customer->customerNumber)->plainTextToken;
        
        return response()->json([
            'status' => 'ok',
            'accessToken' => $token
        ]);
    }
    public function logout()
    {
        $this->user()->tokens()->delete();

        return [
            'message' => 'Logged out!'
        ];
    }
}
