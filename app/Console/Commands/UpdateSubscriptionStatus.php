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
            // Get all non-ended subscriptions for the user ordered by start_date
            $services = Service::where('user_id', $user->user_id)
                ->where('status', '!=', 'Ended')
                ->orderBy('start_date', 'asc')
                ->get();

            if ($services->isEmpty()) {
                continue;
            }

            // Get the latest service
            $latestService = $services->sortByDesc('start_date')->first();

            // First pass: Reset all future statuses to Pre-paid
            foreach ($services as $service) {
                $startDate = Carbon::parse($service->start_date);

                // Set future services to Pre-paid
                if ($startDate->gt($today)) {
                    $service->status = 'Pre-paid';
                    $service->save();
                }
            }

            // Second pass: Process Active, Due and Expired services
            $activeServices = collect();
            foreach ($services as $service) {
                $startDate = Carbon::parse($service->start_date);
                $dueDate = Carbon::parse($service->due_date);

                // Skip if it's a future service (already set to Pre-paid)
                if ($startDate->gt($today)) {
                    continue;
                }

                // If service is past due date, mark as Expired
                if ($dueDate->lt($today)) {
                    $service->status = 'Expired';
                    $service->save();
                    continue;
                }

                // Check Impending (3 days before due date)
                $impendingDate = $dueDate->copy()->subDays(3);
                if ($impendingDate->lte($today) && $dueDate->gt($today)) {
                    $service->status = 'Impending';
                    $service->save();
                    $activeServices->push($service);
                    continue;
                }


                // If today is the due date, mark as Due
                if ($dueDate->isSameDay($today)) {
                    $service->status = 'Due';
                    $service->save();
                    $activeServices->push($service);
                    continue;
                }

                // If service started and hasn't reached due date, set to Active
                if ($startDate->lte($today) && $dueDate->gt($today)) {
                    $service->status = 'Active';
                    $service->save();
                    $activeServices->push($service);
                }
            }

            // Third pass: Handle Overdue status for latest service
            if ($latestService) {
                $latestDueDate = Carbon::parse($latestService->due_date);

                // Check if latest service is past due and there are no future services
                if ($latestDueDate->lt($today)) {
                    $hasFutureServices = $services->contains(function ($service) use ($today) {
                        return Carbon::parse($service->start_date)->gt($today);
                    });

                    if (!$hasFutureServices) {
                        $latestService->status = 'Overdue';
                        $latestService->save();
                    }
                }
            }

            // Fourth pass: Set past expired services to Ended
            if ($latestService && ($latestService->status === 'Active' || $latestService->status === 'Due' || $latestService->status === 'Overdue')) {
                $activeOrOverdueStartDate = Carbon::parse($latestService->start_date);

                foreach ($services as $service) {
                    $serviceStartDate = Carbon::parse($service->start_date);
                    $serviceDueDate = Carbon::parse($service->due_date);

                    // Set to Ended if: service is expired and before the active/overdue service
                    if ($serviceDueDate->lt($today) && $serviceStartDate->lt($activeOrOverdueStartDate)) {
                        $service->status = 'Ended';
                        $service->save();
                    }
                }
            }
        }

        // \Log::info('service:update-status command executed at ' . now());
        // $this->info('Periodic updates to subscription statuses - 100%.');
    }
}