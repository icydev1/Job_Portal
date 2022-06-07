<?php

namespace App\Listeners;

use App\Events\HireUserEvent;
use App\Mail\HiringMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class HireUserListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $getDetail;

    public function __construct($getDetail = '')

    {

        $this->getDetail = $getDetail;

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(HireUserEvent $getDetail)
    {

        $email = $getDetail->getDetail['user_email'];

        Mail::to($email)->send(new HiringMail($getDetail));
    }
}
