<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class UpdateEventStatus extends Command
{
    protected $signature = 'events:update-status';
    protected $description = 'Update event statuses based on their date';

    public function handle()
    {
        // Get the current date
        $today = Carbon::now()->startOfDay();

        // Find events that are currently active and should be marked as ended
        $eventsToEnd = Event::where('status', 'active')
            ->where('date', '<', $today->toDateString())
            ->get();

        // Update ended events
        foreach ($eventsToEnd as $event) {
            $event->status = 'ended';
            $event->save();
        }

        // Log the number of events updated
        $this->info("Updated {$eventsToEnd->count()} active events to 'ended'.");
    }
}