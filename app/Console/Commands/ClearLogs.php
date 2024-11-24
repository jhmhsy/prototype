<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all log files in the storage/logs directory';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $logPath = storage_path('logs');

        // Delete all log files in the logs directory
        foreach (glob("$logPath/*.log") as $logFile) {
            if (file_exists($logFile)) {
                unlink($logFile);
            }
        }

        $this->info('All logs have been cleared.');
        return 0;
    }
}