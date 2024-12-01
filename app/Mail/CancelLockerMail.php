<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

use App\Models\Locker;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CancelLockerMail extends Mailable
{
    use SerializesModels;

    public $locker;
    public $confirmationUrl;

    public function __construct(Locker $locker)
    {
        $this->locker = $locker;
        $this->confirmationUrl = url('/admin/confirmation');  // This dynamically generates the URL
    }

    public function build()
    {
        return $this->subject('Cancelation Approval:  ')
            ->view('emails.locker-cancel');
    }
}