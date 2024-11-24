<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

use App\Models\Treadmill;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CancelTreadmillMail extends Mailable
{
    use SerializesModels;

    public $treadmill;
    public $confirmationUrl;

    public function __construct(Treadmill $treadmill)
    {
        $this->treadmill = $treadmill;
        $this->confirmationUrl = url('/confirmation');  // This dynamically generates the URL
    }

    public function build()
    {
        return $this->subject('Cancelation Approval:  ')
            ->view('emails.treadmill-cancel');
    }
}