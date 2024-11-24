<?php

namespace App\Mail;

use App\Models\Locker;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LockerDueNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $locker;

    /**
     * Create a new message instance.
     */
    public function __construct(Locker $locker)
    {
        $this->locker = $locker;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.locker-due')
            ->subject('Locker Rental Due Reminder')
            ->with([
                'locker' => $this->locker,
                'member' => $this->locker->member,
            ]);
    }
}