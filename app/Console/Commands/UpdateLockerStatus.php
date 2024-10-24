<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Locker;
use Carbon\Carbon;

class UpdateLockerStatus extends Command
{
    protected $signature = 'locker:update-status';
    protected $description = 'Update locker status based on due date and subscription extensions';

    public function handle()
    {
        $today = Carbon::now()->startOfDay();
        $this->info("Processing status updates for date: " . $today->toDateString());

        // Get all users who have locker subscriptions
        $users = Locker::select('user_id')->distinct()->get();

        foreach ($users as $user) {
            // Get all locker subscriptions for the user ordered by start_date
            $userLockers = Locker::where('user_id', $user->user_id)
                ->orderBy('start_date', 'asc')
                ->get();

            if ($userLockers->isEmpty()) {
                continue;
            }

            // Reset all future statuses first to ensure proper processing
            foreach ($userLockers as $locker) {
                $startDate = Carbon::parse($locker->start_date);
                $dueDate = Carbon::parse($locker->due_date);

                // Skip if already expired
                if ($locker->status === 'Expired') {
                    continue;
                }

                // Reset status for non-expired lockers
                $locker->status = 'Inactive';
                $locker->save();
            }

            // Process current and future subscriptions
            $hasActiveSubscription = false;

            foreach ($userLockers as $locker) {
                $startDate = Carbon::parse($locker->start_date);
                $dueDate = Carbon::parse($locker->due_date);

                // Debug information
                $this->info("Processing locker {$locker->locker_no}:");
                $this->info("Start Date: {$startDate->toDateString()}");
                $this->info("Due Date: {$dueDate->toDateString()}");
                $this->info("Current Status: {$locker->status}");

                // Handle expired subscriptions
                if ($dueDate->lt($today)) {
                    $locker->status = 'Expired';
                    $locker->save();
                    continue;
                }

                // Handle current period subscription
                if ($startDate->lte($today) && $dueDate->gte($today)) {
                    if ($dueDate->isSameDay($today)) {
                        $locker->status = 'Due';
                    } else {
                        $locker->status = 'Active';
                    }
                    $hasActiveSubscription = true;
                    $locker->save();
                }
                // Future subscriptions remain 'Inactive'
            }

            // Handle overdue status
            if (!$hasActiveSubscription) {
                $latestExpired = $userLockers
                    ->where('status', 'Expired')
                    ->sortByDesc('due_date')
                    ->first();

                if ($latestExpired) {
                    $nextSubscription = $userLockers
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
        \Log::info('locker:update-status command executed at ' . now());
        $this->info('Locker statuses updated successfully.');
    }

    /**
     * Handle subscription extension
     */
    public function handleExtension(int $userId, Locker $newSubscription)
    {
        $today = Carbon::now()->startOfDay();

        // Get current subscription
        $currentSubscription = Locker::where('user_id', $userId)
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