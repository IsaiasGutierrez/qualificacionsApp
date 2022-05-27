<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class butlletiMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Butlletí de notes";

    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($butlleti)
    {
        $this->pdf = $butlleti;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.butlletiemail')
        ->attach($this->pdf['archivo']->getRealPath(),[
            'as'=>$this->pdf['archivo']->getClientOriginalname()
        ]);
    }
}
