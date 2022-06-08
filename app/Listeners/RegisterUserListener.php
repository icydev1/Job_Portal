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


    public $user;

    public function __construct($user=""){

      $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($user)
    {

        $email = $user->user->email;

        Mail::to($email)->send(new RegisterMail($user));
    }
}
