<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function show()
    {
        $payments = DB::table('payments')->where('paymentDate', '>', '2004-12-31')->get();

        return dd($payments);
    }
}
