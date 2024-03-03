<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function showWithEmployees()
    {
        $result = Customer::join('employees','customers.salesRepEmployeeNumber', '=', 'employees.employeeNumber')->get();

        return response()->json($result);
    }
}
