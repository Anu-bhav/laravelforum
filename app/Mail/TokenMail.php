<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TokenMail extends Mailable
{
    // php artisan make:mail TokenMail
    
    use Queueable, SerializesModels;
    public $name;
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $body)
    {
        $this->name = $name;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->view('inc.mail')
                    ->subject('Login to my Hacking Forum');
    }
}
