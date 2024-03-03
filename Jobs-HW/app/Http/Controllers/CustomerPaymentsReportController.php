<?php

namespace App\Http\Controllers;

use App\Jobs\SendCustomerPaymentsReportJob;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerPaymentsReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->query('from');
        $to = $request->query('to');

        SendCustomerPaymentsReportJob::dispatch(null, $from, $to);

        return response()->json('ok');
    }
    public function show(Request $request, Customer $customer)
    {
        $from = $request->query('from');
        $to = $request->query('to');

        SendCustomerPaymentsReportJob::dispatch($customer, $from, $to);

        return response()->json('ok');
    }
}
