<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Service;
use Carbon\Carbon;

class UpdateSubscriptionStatus extends Command
{
    protected $signature = 'service:update-status';
    protected $description = 'Update subscription service status based on due date and extensions';

    public function handle()
    {
        $today = Carbon::now()->startOfDay();
        $this->info("Processing subscription status updates for date: " . $today->toDateString());

        // Get all users who have subscriptions
        $users = Service::select('user_id')->distinct()->get();

        foreach ($users as $user) {
            // Get all subscriptions for the user ordered by start_date
            $userServices = Service::where('user_id', $user->user_id)
                ->orderBy('start_date', 'asc')
                ->get();

            if ($userServices->isEmpty()) {
                continue;
            }

            // Reset all future statuses first to ensure proper processing
            foreach ($userServices as $service) {
                $startDate = Carbon::parse($service->start_date);
                $dueDate = Carbon::parse($service->due_date);

                // Skip if already expired
                if ($service->status === 'Expired') {
                    continue;
                }

                // Reset status for non-expired services
                $service->status = 'Inactive';
                $service->save();
            }

            // Process current and future subscriptions
            $hasActiveSubscription = false;

            foreach ($userServices as $service) {
                $startDate = Carbon::parse($service->start_date);
                $dueDate = Carbon::parse($service->due_date);

                // Debug information
                $this->info("Processing service {$service->service_id}:");
                $this->info("Type: {$service->service_type}");
                $this->info("Start Date: {$startDate->toDateString()}");
                $this->info("Due Date: {$dueDate->toDateString()}");
                $this->info("Current Status: {$service->status}");

                // Handle expired subscriptions
                if ($dueDate->lt($today)) {
                    $service->status = 'Expired';
                    $service->save();
                    continue;
                }

                // Handle current period subscription
                if ($startDate->lte($today) && $dueDate->gte($today)) {
                    if ($dueDate->isSameDay($today)) {
                        $service->status = 'Due';
                    } else {
                        $service->status = 'Active';
                    }
                    $hasActiveSubscription = true;
                    $service->save();

                    // If this is a monthly subscription, check if renewal reminder is needed
                    if ($service->service_type === 'Monthly' && $dueDate->diffInDays($today) <= 7) {
                        $this->sendRenewalReminder($service);
                    }
                }
                // Future subscriptions remain 'Inactive'
            }

            // Handle overdue status
            if (!$hasActiveSubscription) {
                $latestExpired = $userServices
                    ->where('status', 'Expired')
                    ->sortByDesc('due_date')
                    ->first();

                if ($latestExpired) {
                    $nextSubscription = $userServices
                        ->where('start_date', '>', $latestExpired->due_date)
                        ->where('status', '!=', 'Expired')
                        ->first();

                    if (!$nextSubscription) {
                        $latestExpired->status = 'Overdue';
                        $latestExpired->save();
                    }
                }
            }
        }

        \Log::info('service:update-status command executed at ' . now());
        $this->info('Periodic updates to subscription statuses - 100%.');
    }

    /**
     * Handle subscription extension/renewal
     */
    public function handleRenewal(int $userId, Service $newSubscription)
    {
        $today = Carbon::now()->startOfDay();

        // Get current subscription
        $currentSubscription = Service::where('user_id', $userId)
            ->where(function ($query) use ($today) {
                $query->where('status', 'Active')
                    ->orWhere('status', 'Overdue');
            })
            ->orderBy('due_date', 'desc')
            ->first();

        if ($currentSubscription) {
            if ($currentSubscription->status === 'Overdue') {
                // If current subscription is overdue, expire it and set new one to active
                $currentSubscription->status = 'Expired';
                $currentSubscription->save();

                $newStartDate = Carbon::parse($newSubscription->start_date);
                if ($newStartDate->lte($today)) {
                    $newSubscription->status = 'Active';
                } else {
                    $newSubscription->status = 'Inactive';
                }
            } else if ($currentSubscription->status === 'Active') {
                // If current subscription is active, set new one to inactive
                $newStartDate = Carbon::parse($newSubscription->start_date);
                if ($newStartDate->gt($today)) {
                    $newSubscription->status = 'Inactive';
                }
            }
        } else {
            // No current subscription, set new one based on dates
            $newStartDate = Carbon::parse($newSubscription->start_date);
            $newDueDate = Carbon::parse($newSubscription->due_date);

            if ($newStartDate->lte($today) && $newDueDate->gt($today)) {
                $newSubscription->status = 'Active';
            } else if ($newStartDate->gt($today)) {
                $newSubscription->status = 'Inactive';
            }
        }

        $newSubscription->save();
    }

    /**
     * Send renewal reminder notification
     */
    private function sendRenewalReminder(Service $service)
    {
        // Implement notification logic here
        // This could integrate with your notification system
        \Log::info("Renewal reminder needed for service {$service->service_id}");
    }
}