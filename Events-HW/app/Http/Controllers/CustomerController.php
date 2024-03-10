<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return 'successfully!';
    }
}
