<?php

namespace App\Mail;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberDeletion extends Mailable
{
    use Queueable, SerializesModels;

    public $member;

    public $confirmationUrl;
    /**
     * Create a new message instance.
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
        $this->confirmationUrl = url('/admin/confirmation');
    }

    /**
     * Build the message.
     */


    public function build()
    {
        return $this->subject('Member Deletion Approval') // Removed extra space
            ->view('emails.member-delete');
    }
}