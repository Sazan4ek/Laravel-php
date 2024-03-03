<?php

namespace App\Jobs;

use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendCustomerPaymentsReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customer;
    protected $from;
    protected $to;

    /**
     * Create a new job instance.
     */
    public function __construct(Customer $customer = null, string $from = "0000-00-00", string $to = "100000-12-31")
    {
        $this->customer = $customer;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if($this->customer)
        {
            $payments = $this->customer->payments;
            $payments = $payments->filter(function ($item)
            {
                if($item['paymentDate'] >= $this->from && $item['paymentDate'] <= $this->to) return 1;
            });
            $payments->all();
        }
        else
        {
            $query = Payment::query();
            if($this->from) $query->where('paymentDate', '>=',  $this->from);
            if($this->to) $query->where('paymentDate', '<=',  $this->to);

            $payments = $query->get();
        }
        $payments = $payments ?? 'Empty';

        Storage::disk('local')->put('payments.txt',
            'Customer: '.( $this->customer ? $this->customer->customerNumber : 'everybody' )
           .' '.$payments->toJson(),
        );
    }
}
