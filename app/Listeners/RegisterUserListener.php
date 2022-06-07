<?php

namespace App\Listeners;

use App\Events\RegisterUserEvent;
use App\Mail\RegisterMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RegisterUserListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */

     public $email;

    public function __construct($email  = '')
    {
       $this->email = $email;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($email)
    {
        $em = $email;

        Mail::to($em)->send(new RegisterMail($em));
    }
}
