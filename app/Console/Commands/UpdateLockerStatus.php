<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Locker;
use Carbon\Carbon;

class UpdateLockerStatus extends Command
{
    protected $signature = 'locker:update-status';
    protected $description = 'Update locker status based on due date and extensions';

    public function handle()
    {
        $today = Carbon::now()->startOfDay();
        $this->info("Processing locker status updates for date: " . $today->toDateString());

        // Get all users who have lockers
        $users = Locker::select('user_id')->distinct()->get();

        foreach ($users as $user) {
            // Get all non-ended lockers for the user ordered by start_date
            $lockers = Locker::where('user_id', $user->user_id)
                ->where('status', '!=', 'Ended')
                ->orderBy('start_date', 'asc')
                ->get();

            if ($lockers->isEmpty()) {
                continue;
            }

            // Get the latest locker
            $latestLocker = $lockers->sortByDesc('start_date')->first();

            // First pass: Reset all future statuses to Pre-paid
            foreach ($lockers as $locker) {
                $startDate = Carbon::parse($locker->start_date);

                // Set future lockers to Pre-paid
                if ($startDate->gt($today)) {
                    $locker->status = 'Pre-paid';
                    $locker->save();
                }
            }

            // Second pass: Process Active, Due and Expired lockers
            $activeLockers = collect();
            foreach ($lockers as $locker) {
                $startDate = Carbon::parse($locker->start_date);
                $dueDate = Carbon::parse($locker->due_date);

                // Skip if it's a future locker (already set to Pre-paid)
                if ($startDate->gt($today)) {
                    continue;
                }

                // If locker is past due date, mark as Expired
                if ($dueDate->lt($today)) {
                    $locker->status = 'Expired';
                    $locker->save();
                    continue;
                }

                // Check Impending (3 days before due date)
                $impendingDate = $dueDate->copy()->subDays(3);
                if ($impendingDate->lte($today) && $dueDate->gt($today)) {
                    $locker->status = 'Impending';
                    $locker->save();
                    $activeLockers->push($locker);
                    continue;
                }


                // If today is the due date, mark as Due
                if ($dueDate->isSameDay($today)) {
                    $locker->status = 'Due';
                    $locker->save();
                    $activeLockers->push($locker);
                    continue;
                }

                // If locker started and hasn't reached due date, set to Active
                if ($startDate->lte($today) && $dueDate->gt($today)) {
                    $locker->status = 'Active';
                    $locker->save();
                    $activeLockers->push($locker);
                }
            }

            // Third pass: Handle Overdue status for latest locker
            if ($latestLocker) {
                $latestDueDate = Carbon::parse($latestLocker->due_date);

                // Check if latest locker is past due and there are no future lockers
                if ($latestDueDate->lt($today)) {
                    $hasFutureLockers = $lockers->contains(function ($locker) use ($today) {
                        return Carbon::parse($locker->start_date)->gt($today);
                    });

                    if (!$hasFutureLockers) {
                        $latestLocker->status = 'Overdue';
                        $latestLocker->save();
                    }
                }
            }

            // Fourth pass: Set past expired lockers to Ended
            if ($latestLocker && ($latestLocker->status === 'Active' || $latestLocker->status === 'Due' || $latestLocker->status === 'Overdue')) {
                $activeOrOverdueStartDate = Carbon::parse($latestLocker->start_date);

                foreach ($lockers as $locker) {
                    $lockerStartDate = Carbon::parse($locker->start_date);
                    $lockerDueDate = Carbon::parse($locker->due_date);

                    // Set to Ended if: locker is expired and before the active/overdue locker
                    if ($lockerDueDate->lt($today) && $lockerStartDate->lt($activeOrOverdueStartDate)) {
                        $locker->status = 'Ended';
                        $locker->save();
                    }
                }
            }
        }

        // \Log::info('locker:update-status command executed at ' . now());
        // $this->info('Periodic updates to locker statuses - 100%.');
    }
}