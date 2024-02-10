<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function showWithEmployees()
    {
        $result = DB::table('customers')
            ->join('employees','customers.salesRepEmployeeNumber', '=', 'employees.employeeNumber')
            ->get();

        return dd($result);
    }
}
