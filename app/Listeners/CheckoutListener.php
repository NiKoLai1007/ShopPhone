<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CheckoutEvent;
use App\Mail\CheckoutMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class CheckoutListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $mail = new CheckoutMail($event->order);
        $mailMessage = $mail->build();

        // Assuming the order has a relationship with the user and user_id is the foreign key
        $user = User::find($event->order->user_id);

        if ($user && $user->email) {
            // Send the email to the recipient email address from the database
            Mail::to($user->email)->send($mailMessage);
        }

    }
}
