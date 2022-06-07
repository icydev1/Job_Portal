<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostJob extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $storeJobs;

    public function __construct($storeJobs){
      $this->storeJobs = $storeJobs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Job Portal')
        ->from('testinglaravel31@gmail.com', 'Job Portal')
        ->view('emails.PostJobMail');
    }
}
