<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Locker; // Import your Locker model here

class UpdateServiceStatus extends Command
{
    protected $signature = 'locker:update-status';
    protected $description = 'Update locker status based on due date';

    public function handle()
    {
        $today = now()->toDateString(); // Get today's date

        // Update the status to 'Inactive' for all locker records with a due date today or in the past
        Locker::where('due_date', '<=', $today)
            ->update(['status' => 'Expired']);

        $this->info('Locker statuses updated successfully.');
    }
}