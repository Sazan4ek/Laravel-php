<?php

namespace App\Listeners;

use App\Mail\OrderStatusMail;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotificationAboutOrderStatus
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $order = Order::find($event->orderNumber);
        $customerFullName = $order->customer;
        $email = trim($customerFullName->contactFirstName).$customerFullName->contactLastName.'@gmail.com';
        Mail::to($email)->send(new OrderStatusMail($event->status, $event->orderNumber));
    }
}
