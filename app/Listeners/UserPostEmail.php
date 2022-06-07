<?php

namespace App\Listeners;

use App\Events\UserPostJob;
use App\Mail\PostJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserPostEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $storeJobs;

    public function __construct($storeJobs = ''){
      $this->storeJobs = $storeJobs;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserPostJob $storeJobs)
    {

        $email = $storeJobs->storeJobs->company_email;

        Mail::to($email)->send(new PostJob($storeJobs));
    }
}
