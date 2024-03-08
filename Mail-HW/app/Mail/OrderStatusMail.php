<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public string $status;
    public int $orderNumber;
    public function __construct(string $status, int $orderNumber)
    {
        $this->status = $status;
        $this->orderNumber = $orderNumber;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Status changed!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view = 'mails.order.';
        switch($this->status)
        {
            case 'Shipped': 
                $view .= 'shipped';
            break;
            case 'Cancelled': 
                $view .= 'cancelled';
            break;
            case 'Resolved': 
                $view .= 'resolved';
            break;
            case 'On Hold': 
                $view .= 'onHold';
            break;
            case 'In Process': 
                $view .= 'inProcess';
            break;
        }

        return new Content(
            view: $view,
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
