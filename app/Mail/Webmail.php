<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Webmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email_data = $data;
        $this->subject = $data['Subject'];
        $this->Sender = $data['Sender'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->email_data['Initiator'] == "disapprove"){
            return $this->from(env('MAIL_USERNAME'), $this->Sender)
            ->subject($this->subject)
            ->view('mail.index', ['email_data' => $this->email_data]);
        }

    }
}
