<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "deleting" event.
     */
    public function deleting(Order $order): void
    {
        $order->orderDetails()->delete();
    }
}
