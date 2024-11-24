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
        $this->info("Processing treadmill subscription status updates for date: " . $today->toDateString());

        // Get all users who have treadmill subscriptions
        $users = Treadmill::select('user_id')->distinct()->get();

        foreach ($users as $user) {
            // Get all non-ended treadmill subscriptions for the user ordered by start_date
            $treadmills = Treadmill::where('user_id', $user->user_id)
                ->whereNotIn('status', ['Ended', 'Pending'])
                ->orderBy('start_date', 'asc')
                ->get();

            if ($treadmills->isEmpty()) {
                continue;
            }

            // Get the latest treadmill subscription
            $latestTreadmill = $treadmills->sortByDesc('start_date')->first();

            // First pass: Reset all future statuses to Pre-paid
            foreach ($treadmills as $treadmill) {
                $startDate = Carbon::parse($treadmill->start_date);

                // Set future treadmill subscriptions to Pre-paid
                if ($startDate->gt($today)) {
                    $treadmill->status = 'Pre-paid';
                    $treadmill->save();
                }
            }

            // Second pass: Process Active, Due and Expired treadmill subscriptions
            $activeTreadmills = collect();
            foreach ($treadmills as $treadmill) {
                $startDate = Carbon::parse($treadmill->start_date);
                $dueDate = Carbon::parse($treadmill->due_date);

                // Skip if it's a future treadmill subscription (already set to Pre-paid)
                if ($startDate->gt($today)) {
                    continue;
                }

                // If treadmill subscription is past due date, mark as Expired
                if ($dueDate->lt($today)) {
                    $treadmill->status = 'Expired';
                    $treadmill->save();
                    continue;
                }

                // Check Impending (3 days before due date)
                $impendingDate = $dueDate->copy()->subDays(3);
                if ($impendingDate->lte($today) && $dueDate->gt($today)) {
                    $treadmill->status = 'Impending';
                    $treadmill->save();
                    $activeTreadmills->push($treadmill);
                    continue;
                }



                // If today is the due date, mark as Due
                if ($dueDate->isSameDay($today)) {
                    $treadmill->status = 'Due';
                    $treadmill->save();
                    $activeTreadmills->push($treadmill);
                    continue;
                }

                // If treadmill subscription started and hasn't reached due date, set to Active
                if ($startDate->lte($today) && $dueDate->gt($today)) {
                    $treadmill->status = 'Active';
                    $treadmill->save();
                    $activeTreadmills->push($treadmill);
                }
            }

            // Third pass: Handle Overdue status for latest treadmill subscription
            if ($latestTreadmill) {
                $latestDueDate = Carbon::parse($latestTreadmill->due_date);

                // Check if latest treadmill subscription is past due and there are no future subscriptions
                if ($latestDueDate->lt($today)) {
                    $hasFutureTreadmills = $treadmills->contains(function ($treadmill) use ($today) {
                        return Carbon::parse($treadmill->start_date)->gt($today);
                    });

                    if (!$hasFutureTreadmills) {
                        $latestTreadmill->status = 'Overdue';
                        $latestTreadmill->save();
                    }
                }
            }

            // Fourth pass: Set past expired treadmill subscriptions to Ended
            if ($latestTreadmill && ($latestTreadmill->status === 'Active' || $latestTreadmill->status === 'Due' || $latestTreadmill->status === 'Overdue')) {
                $activeOrOverdueStartDate = Carbon::parse($latestTreadmill->start_date);

                foreach ($treadmills as $treadmill) {
                    $treadmillStartDate = Carbon::parse($treadmill->start_date);
                    $treadmillDueDate = Carbon::parse($treadmill->due_date);

                    // Set to Ended if: treadmill subscription is expired and before the active/overdue subscription
                    if ($treadmillDueDate->lt($today) && $treadmillStartDate->lt($activeOrOverdueStartDate)) {
                        $treadmill->status = 'Ended';
                        $treadmill->save();
                    }
                }
            }
        }

        // \Log::info('treadmill:update-status command executed at ' . now());
        // $this->info('Periodic updates to treadmill subscription statuses - 100%.');
    }
}