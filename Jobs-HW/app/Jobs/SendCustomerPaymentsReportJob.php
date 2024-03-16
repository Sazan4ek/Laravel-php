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
    public function __construct(Customer $customer = null, string $from = null, string $to = null)
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
            $payments = $this->customer->payments()
                ->when($this->from, function($query){
                    $query->where('paymentDate', '>=', $this->from);
                })
                ->when($this->to, function($query){
                    $query->where('paymentDate', '<=', $this->to);
                })
                ->get();
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
