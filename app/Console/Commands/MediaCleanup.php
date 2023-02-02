<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MediaCleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleans leftover media folders and files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // find media folders which dont have any DB entry in media
        $zombie_folders = collect(Storage::disk('media')->directories())->diff(DB::table('media')->pluck('id'));

        if ($this->confirm('Found ' . $zombie_folders->count() . ' leftover media folders. Do you really want to erase?')) {
            if ($zombie_folders->count() > 0) {
                // remove all leftover folders
                foreach ($zombie_folders as $zf) {
                    $dirs = Storage::disk('media')->directories($zf);
                    $this->info('Removing folder ' . $zf);
                    foreach ($dirs as $dir) {
                        Storage::disk('media')->deleteDirectory($dir);
                    }
                    Storage::disk('media')->deleteDirectory($zf);
                }
            } else {
                $this->info('No leftover folders found');
            }
        }
        return Command::SUCCESS;
    }
}
