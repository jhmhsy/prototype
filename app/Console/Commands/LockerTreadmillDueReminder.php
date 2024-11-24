<?php

namespace App\Console\Commands;

use App\Models\Locker;
use App\Models\Treadmill;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\LockerDueNotification;
use App\Mail\TreadmillDueNotification;

class LockerTreadmillDueReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:locker-treadmill-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders for impending locker and treadmill subscriptions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Handle Locker Reminders
        $pendingLockers = Locker::where('status', 'impending')
            ->where('mail_flag', '!=', 1)
            ->with('member')
            ->get();

        foreach ($pendingLockers as $locker) {
            if ($locker->member && $locker->member->email) {
                try {
                    Mail::to($locker->member->email)
                        ->send(new LockerDueNotification($locker));

                    $locker->update(['mail_flag' => 1]);
                    $this->info("Locker reminder sent to {$locker->member->email} for locker no {$locker->locker_no}");
                } catch (\Exception $e) {
                    $this->error("Failed to send locker reminder for ID {$locker->id}: {$e->getMessage()}");
                }
            }
        }

        // Handle Treadmill Reminders
        $pendingTreadmills = Treadmill::where('status', 'impending')
            ->where('mail_flag', '!=', 1)
            ->with('member')
            ->get();

        foreach ($pendingTreadmills as $treadmill) {
            if ($treadmill->member && $treadmill->member->email) {
                try {
                    Mail::to($treadmill->member->email)
                        ->send(new TreadmillDueNotification($treadmill));

                    $treadmill->update(['mail_flag' => 1]);
                    $this->info("Treadmill reminder sent to {$treadmill->member->email} for ID {$treadmill->id}");
                } catch (\Exception $e) {
                    $this->error("Failed to send treadmill reminder for ID {$treadmill->id}: {$e->getMessage()}");
                }
            }
        }

        $this->info('Locker and Treadmill reminder process completed');
    }
}