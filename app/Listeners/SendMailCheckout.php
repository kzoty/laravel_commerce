<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailCheckout
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
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event) {
        $order = $event->getOrder();
        $user = $event->getUser();

        /**
         * Sending email.
         */
        Mail::send('emails.checkout-client', ['order' => $order, 'user' => $user], function($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Pedido!');
        });
    }
}
