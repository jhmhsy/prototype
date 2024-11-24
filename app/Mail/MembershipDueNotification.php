<?php

namespace App\Mail;

use App\Models\MembershipDuration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MembershipDueNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $membership;

    /**
     * Create a new message instance.
     */
    public function __construct(MembershipDuration $membership)
    {
        $this->membership = $membership;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.membership-due')
            ->subject('Membership Expiration Reminder')
            ->with([
                'membership' => $this->membership,
                'member' => $this->membership->member,
            ]);
    }
}