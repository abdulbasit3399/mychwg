<?php

namespace App\Listeners;

use App\Events\PaymentTransfered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class NotifyPaymentTransfered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PaymentTransfered  $event
     * @return void
     */
    public function handle(PaymentTransfered $event)
    {

        User::whereId($event->data)->update(['balance' => 0]);
        
        \Log::notice("Payment transfered event fired.");

    }
}
