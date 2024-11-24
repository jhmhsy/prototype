<?php

namespace App\Mail;

use App\Models\Treadmill;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TreadmillDueNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $treadmill;

    /**
     * Create a new message instance.
     */
    public function __construct(Treadmill $treadmill)
    {
        $this->treadmill = $treadmill;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.treadmill-due')
            ->subject('Treadmill Subscription Due Reminder')
            ->with([
                'treadmill' => $this->treadmill,
                'member' => $this->treadmill->member,
            ]);
    }
}