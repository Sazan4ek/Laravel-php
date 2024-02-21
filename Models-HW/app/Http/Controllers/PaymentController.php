<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function show()
    {
        $payments = Payment::where('paymentDate', '>', '2004-12-31')->get();

        return response()->json($payments);
    }
}
