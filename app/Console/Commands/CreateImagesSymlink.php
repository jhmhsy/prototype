<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateImagesSymlink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:link-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a symbolic link for the images folder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $target = storage_path('app/public/images');
        $link = public_path('images');

        if (File::exists($link)) {
            $this->error('The "public/images" link already exists.');
            return 1;
        }

        File::link($target, $link);
        $this->info('The "public/images" link has been created.');
        return 0;
    }
}