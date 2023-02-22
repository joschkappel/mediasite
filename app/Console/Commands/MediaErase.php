<?php

namespace App\Console\Commands;

use App\Models\Photo;
use App\Models\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MediaErase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:erase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Erase all projects, photos and media files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        if ($this->confirm('Do you really want to erase ALL media and projects?')) {

            // delete all photos and media files
            $photos = Photo::whereNotNull('id')->delete();
            $this->info($photos . ' photos and media files deleted');
            // deltet media zombie entries in DB
            DB::table('media')->delete();

            // delete all projects
            $projects = Project::whereNotNull('id')->delete();
            $this->info($projects . ' projects deleted');

            // remove zombi files
            $dirs = Storage::disk('media')->allDirectories();
            foreach ($dirs as $dir) {
                if ($dir != 'errors') {
                    Storage::disk('media')->deleteDirectory($dir);
                }
            }
            $this->info((count($dirs) - 1) . ' zombie files deleted');

            return Command::SUCCESS;
        }
        return Command::SUCCESS;
    }
}
