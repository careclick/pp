<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;

     public $user_d;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_d)
    {
         $this->user_d = $user_d;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.tplan', ['user'=>$this->user_d])->from('hygeia@careclick.healthcare','HygeiaHMO')->subject('Welcome Onboard');
    }
}
