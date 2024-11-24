<?php

namespace App\Console\Commands;

use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceDueNotification;

class ServiceDueReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:service-due-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders for impending services';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all impending services where mail_flag is not set
        $pendingServices = Service::where('status', 'impending')
            ->where('mail_flag', '!=', 1)
            ->with('member') // Eager load the member relationship
            ->get();

        foreach ($pendingServices as $service) {
            // Check if the service has an associated member with an email
            if ($service->member && $service->member->email) {
                try {
                    // Send email notification
                    Mail::to($service->member->email)
                        ->send(new ServiceDueNotification($service));

                    // Update mail_flag after successful sending
                    $service->update(['mail_flag' => 1]);

                    $this->info("Reminder sent to {$service->member->email} for service ID {$service->id}");
                } catch (\Exception $e) {
                    $this->error("Failed to send reminder for service ID {$service->id}: {$e->getMessage()}");
                }
            }
        }

        $this->info('Service due reminder process completed');
    }
}