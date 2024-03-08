<?php

namespace App\Listeners;

use App\Mail\OrderStatusMail;
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
        Mail::to('customer@gmail.com')->send(new OrderStatusMail($event->status, $event->orderNumber));
    }
}
