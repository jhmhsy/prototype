<?php

namespace App\Console\Commands;

use App\Models\MembershipDuration;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\MembershipDueNotification;

class MembershipDueReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:membership-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders for expiring memberships';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all impending membership expirations where mail_flag is not set
        $pendingMemberships = MembershipDuration::where('status', 'impending')
            ->where('mail_flag', '!=', 1)
            ->with('member') // Eager load the member relationship
            ->get();

        foreach ($pendingMemberships as $membership) {
            if ($membership->member && $membership->member->email) {
                try {
                    Mail::to($membership->member->email)
                        ->send(new MembershipDueNotification($membership));

                    $membership->update(['mail_flag' => 1]);
                    $this->info("Membership reminder sent to {$membership->member->email}");
                } catch (\Exception $e) {
                    $this->error("Failed to send membership reminder for member ID {$membership->member_id}: {$e->getMessage()}");
                }
            }
        }

        $this->info('Membership reminder process completed');
    }
}