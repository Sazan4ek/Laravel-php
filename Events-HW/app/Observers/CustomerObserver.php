<?php

namespace App\Observers;

use App\Models\Customer;

class CustomerObserver
{
    /**
     * Handle the Customer "deleting" event.
     */
    public function deleting(Customer $customer): void
    {
        $orders = $customer->orders;

        foreach ($orders as $order) 
        {
            $order->delete();
        }
        $customer->payments()->delete();
    }
}
