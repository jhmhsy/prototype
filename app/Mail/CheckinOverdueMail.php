<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Member;
use Illuminate\Queue\SerializesModels;

class CheckinOverdueMail extends Mailable
{
    use SerializesModels;

    public $member;
    public $confirmationUrl;
    public $overdueLockers;
    public $overdueServices;
    public $overdueTreadmills;

    public function __construct(Member $member, $overdueLockers, $overdueServices, $overdueTreadmills)
    {
        $this->member = $member;
        $this->overdueLockers = $overdueLockers;
        $this->overdueServices = $overdueServices;
        $this->overdueTreadmills = $overdueTreadmills;
        $this->confirmationUrl = url('/admin/members/index?search=' . urlencode($member->name));
    }

    public function build()
    {
        return $this->subject('Force Checked-in Warning: Overdue Subscription')
            ->view('emails.checkin-overdue');
    }
}