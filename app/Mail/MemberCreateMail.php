<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberCreateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $confirmationUrl;

    public $name;
    public $membership_type;
    public $amount;
    public $start_date;
    public $due_date;
    public $status;


    public function __construct($name, $membership_type, $amount, $start_date, $due_date, $status)
    {
        $this->name = $name;
        $this->membership_type = $membership_type;
        $this->amount = $amount;
        $this->start_date = $start_date;
        $this->due_date = $due_date;
        $this->status = $status;
        $this->confirmationUrl = url('/admin/members/index?search=' . urlencode($name));
    }

    public function build()
    {
        return $this->subject('Notification: New Member Registration')
            ->view('emails.member-create'); // You can change this to your preferred view
    }
}