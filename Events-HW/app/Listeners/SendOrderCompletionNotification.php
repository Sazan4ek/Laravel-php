<?php

namespace App\Listeners;

use App\Events\OrderCompleted;
use App\Mail\OrderCompletedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderCompletionNotification
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
        $orderNumber = $event->orderNumber;
        $customerNumber = $event->customerNumber;
        Mail::to(config('emails.managerEmail'))->send(new OrderCompletedMail($orderNumber, $customerNumber));
    }
}
