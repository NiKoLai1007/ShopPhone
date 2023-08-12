<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ConfirmOrderEvent;
use App\Mail\ConfirmOrderMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User; // Make sure to import your User model

class ConfirmOrderListener
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
     * @param  ConfirmOrderEvent  $event
     * @return void
     */
    public function handle(ConfirmOrderEvent $event)
    {
        $mail = new ConfirmOrderMail($event->order);
        $mailmessage = $mail->build();

        // Assuming the order has a relationship with the user and user_id is the foreign key
        $user = User::find($event->order->user_id);

        if ($user && $user->email) {
            // Set the sender
            $mailmessage->from('shancastropalima@gmail.com', 'ShopPhone');

            // Send the email to the recipient email address from the database
            Mail::to($user->email)->send($mailmessage);
        }


    }
}
