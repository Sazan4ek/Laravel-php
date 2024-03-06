<?php

namespace App\Http\Controllers;

use App\Events\OrderCompleted;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function update(Request $request)
    {
        $id = $request->input('orderNumber');
        $newStatus = $request->input('status');
        $order = Order::findOrFail($id);
        
        if($order->status === 'Completed') return response()->json('Impossible action');

        $order->status = $newStatus;
        $order->save();

        if($order->status === 'Completed') event(new OrderCompleted($id, $order->customerNumber));
        else return response()->json('ok');
    }
}
