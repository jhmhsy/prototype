<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Treadmill;
use Carbon\Carbon;

class UpdateTreadmillStatus extends Command
{
    protected $signature = 'treadmill:update-status';
    protected $description = 'Update treadmill subscription status based on due date and extensions';

    public function handle()
    {
        $today = Carbon::now()->startOfDay();
        $this->info("Processing status updates for date: " . $today->toDateString());

        // Get all users who have treadmill subscriptions
        $users = Treadmill::select('user_id')->distinct()->get();

        foreach ($users as $user) {
            // Get all treadmill subscriptions for the user ordered by start_date
            $userTreadmills = Treadmill::where('user_id', $user->user_id)
                ->orderBy('start_date', 'asc')
                ->get();

            if ($userTreadmills->isEmpty()) {
                continue;
            }

            // Reset all future statuses first to ensure proper processing
            foreach ($userTreadmills as $treadmill) {
                $startDate = Carbon::parse($treadmill->start_date);
                $dueDate = Carbon::parse($treadmill->due_date);

                // Skip if already expired
                if ($treadmill->status === 'Expired') {
                    continue;
                }

                // Reset status for non-expired treadmills
                $treadmill->status = 'Inactive';
                $treadmill->save();
            }

            // Process current and future subscriptions
            $hasActiveSubscription = false;

            foreach ($userTreadmills as $treadmill) {
                $startDate = Carbon::parse($treadmill->start_date);
                $dueDate = Carbon::parse($treadmill->due_date);

                // Debug information
                $this->info("Processing treadmill subscription for user {$treadmill->user_id}:");
                $this->info("Start Date: {$startDate->toDateString()}");
                $this->info("Due Date: {$dueDate->toDateString()}");
                $this->info("Current Status: {$treadmill->status}");
                $this->info("Month: {$treadmill->month}");
                $this->info("Amount: {$treadmill->amount}");

                // Handle expired subscriptions
                if ($dueDate->lt($today)) {
                    $treadmill->status = 'Expired';
                    $treadmill->save();
                    continue;
                }

                // Handle current period subscription
                if ($startDate->lte($today) && $dueDate->gte($today)) {
                    if ($dueDate->isSameDay($today)) {
                        $treadmill->status = 'Due';
                    } else {
                        $treadmill->status = 'Active';
                    }
                    $hasActiveSubscription = true;
                    $treadmill->save();
                }
                // Future subscriptions remain 'Inactive'
            }

            // Handle overdue status
            if (!$hasActiveSubscription) {
                $latestExpired = $userTreadmills
                    ->where('status', 'Expired')
                    ->sortByDesc('due_date')
                    ->first();

                if ($latestExpired) {
                    $nextSubscription = $userTreadmills
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

        \Log::info('treadmill:update-status command executed at ' . now());
        $this->info('Treadmill subscription statuses updated successfully.');
    }

    /**
     * Handle subscription renewal
     */
    public function handleRenewal(int $userId, Treadmill $newSubscription)
    {
        $today = Carbon::now()->startOfDay();

        // Get current subscription
        $currentSubscription = Treadmill::where('user_id', $userId)
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
}