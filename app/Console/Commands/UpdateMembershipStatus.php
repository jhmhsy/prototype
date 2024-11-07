<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Member;
use App\Models\MembershipDuration;
use Carbon\Carbon;

class UpdateMembershipStatus extends Command
{
    protected $signature = 'membership:update-status';
    protected $description = 'Update membership status based on Due date and extensions';

    public function handle()
    {
        $today = Carbon::now()->startOfDay();
        $this->info("Processing membership status updates for date: " . $today->toDateString());

        // Get all members who have membership durations
        $members = Member::has('membershipDuration')->get();

        foreach ($members as $member) {
            // Get all membership durations for the member ordered by start_date
            $membershipDurations = MembershipDuration::where('member_id', $member->id)
                ->orderBy('start_date', 'asc')
                ->get();

            if ($membershipDurations->isEmpty()) {
                continue;
            }

            // Reset all future statuses first to ensure proper processing
            foreach ($membershipDurations as $duration) {
                $startDate = Carbon::parse($duration->start_date);
                $dueDate = Carbon::parse($duration->due_date);

                // Skip if already Expired
                if ($duration->status === 'Expired') {
                    continue;
                }

                // Reset status for non-Expired memberships
                $duration->status = 'Inactive';
                $duration->save();
            }

            // Process current and future memberships
            $hasActiveMembership = false;

            foreach ($membershipDurations as $duration) {
                $startDate = Carbon::parse($duration->start_date);
                $dueDate = Carbon::parse($duration->due_date);

                // Debug information
                $this->info("Processing membership for member {$member->id}:");
                $this->info("Name: {$member->name}");
                $this->info("Start Date: {$startDate->toDateString()}");
                $this->info("Due Date: {$dueDate->toDateString()}");
                $this->info("Current Status: {$duration->status}");
                $this->info("Membership Type: {$member->membership_type}");

                // Handle Expired memberships
                if ($dueDate->lt($today)) {
                    $duration->status = 'Expired';
                    $duration->save();
                    continue;
                }

                // Handle current period membership
                if ($startDate->lte($today) && $dueDate->gte($today)) {
                    if ($dueDate->isSameDay($today)) {
                        $duration->status = 'Due';
                    } else {
                        $duration->status = 'Active';
                    }
                    $hasActiveMembership = true;
                    $duration->save();

                    // Add renewal reminder check
                    if ($dueDate->diffInDays($today) <= 7) {
                        $this->sendRenewalReminder($duration);
                    }
                }
                // Future memberships remain 'Inactive'
            }

            // Handle Overdue status
            if (!$hasActiveMembership) {
                $latestExpired = $membershipDurations
                    ->where('status', 'Expired')
                    ->sortByDesc('due_date')
                    ->first();


                if ($latestExpired) {
                    $nextMembership = $membershipDurations
                        ->where('start_date', '>', $latestExpired->due_date)
                        ->where('status', '!=', 'Expired')
                        ->first();

                    if (!$nextMembership) {
                        $latestExpired->status = 'Overdue';
                        $latestExpired->save();
                    }
                }
            }
        }

        \Log::info('membership:update-status command executed at ' . now());
        $this->info('Membership statuses updated successfully.');
    }

    /**
     * Handle membership renewal
     */
    public function handleRenewal(int $memberId, MembershipDuration $newDuration)
    {
        $today = Carbon::now()->startOfDay();

        // Get current membership
        $currentMembership = MembershipDuration::where('member_id', $memberId)
            ->where(function ($query) use ($today) {
                $query->where('status', 'Active')
                    ->orWhere('status', 'Overdue');
            })
            ->orderBy('due_date', 'desc')
            ->first();

        if ($currentMembership) {
            if ($currentMembership->status === 'Overdue') {
                // If current membership is Overdue, expire it and set new one to Active
                $currentMembership->status = 'Expired';
                $currentMembership->save();

                $newStartDate = Carbon::parse($newDuration->start_date);
                if ($newStartDate->lte($today)) {
                    $newDuration->status = 'Active';
                } else {
                    $newDuration->status = 'Inactive';
                }
            } else if ($currentMembership->status === 'Active') {
                // If current membership is Active, set new one to Inactive
                $newStartDate = Carbon::parse($newDuration->start_date);
                if ($newStartDate->gt($today)) {
                    $newDuration->status = 'Inactive';
                }
            }
        } else {
            // No current membership, set new one based on dates
            $newStartDate = Carbon::parse($newDuration->start_date);
            $newDueDate = Carbon::parse($newDuration->due_date);

            if ($newStartDate->lte($today) && $newDueDate->gt($today)) {
                $newDuration->status = 'Active';
            } else if ($newStartDate->gt($today)) {
                $newDuration->status = 'Inactive';
            }
        }

        $newDuration->save();
    }

    /**
     * Send renewal reminder notification
     */
    private function sendRenewalReminder(MembershipDuration $duration)
    {
        // Implement notification logic here
        // This could integrate with your notification system
        \Log::info("Renewal reminder needed for member {$duration->member_id}");
    }
}