<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

use App\Models\Service;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CancelServiceMail extends Mailable
{
    use SerializesModels;

    public $service;
    public $confirmationUrl;

    public function __construct(Service $service)
    {
        $this->service = $service;
        $this->confirmationUrl = url('/admin/confirmation');  // This dynamically generates the URL
    }

    public function build()
    {
        return $this->subject('Cancelation Approval: ')
            ->view('emails.service-cancel');
    }
}