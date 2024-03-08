<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusChanged;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function update(Request $request)
    {
        $id = $request->input('orderNumber');
        $newStatus = $request->input('status');
        $order = Order::findOrFail($id);
        
        if($order->status === 'Shipped') return response()->json('Impossible action');

        $order->status = $newStatus;
        $order->save();

        event(new OrderStatusChanged($order->status, $order->orderNumber));

        return response()->json('ok');
    }
}
