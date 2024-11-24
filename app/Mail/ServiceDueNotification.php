<?php

namespace App\Mail;

use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceDueNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $service;

    /**
     * Create a new message instance.
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.service-due')
            ->subject('Service Due Reminder')
            ->with([
                'service' => $this->service,
                'member' => $this->service->member,
            ]);
    }
}