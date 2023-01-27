<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use App\Models\Photo;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;
use Illuminate\Database\Eloquent\Factories\Sequence;

class MediaCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:create {--R|projects=2} {--P|photos=5}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create sample projects, photos and media';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $num_prj = $this->option('projects');
        $num_pho = $this->option('photos');

        // create N projects
        $projects = Project::factory()
            ->count($num_prj)
            ->state(new Sequence(
                ['active' => true],
                ['active' => false],
            ))
            ->create();
        $this->info($projects->count() . ' projects created');
        $dir = public_path('media');

        foreach ($projects as $prj) {
            // create photo
            $photos = Photo::factory()
                ->count($num_pho)
                ->state(new Sequence(
                    ['active' => true],
                    ['active' => false],
                ))
                ->state(new Sequence(
                    ['show_on_main' => true],
                    ['show_on_main' => false],
                ))
                ->for($prj)
                ->create();
            $this->info($photos->count() . ' photos created');

            // attach media
            $alternate = true;
            foreach ($photos as $p) {
                if ($alternate) {
                    $image = FakerPicsumImagesProvider::image($dir, 1280, 960);
                } else {
                    $image = FakerPicsumImagesProvider::image($dir, 960, 1280);
                }
                $alternate = !$alternate;
                $p->addMedia($image)
                    ->usingName($p->name)
                    ->withResponsiveImages()
                    ->toMediaCollection();
            }
            $this->info($photos->count() . ' media files created');
        }
        return Command::SUCCESS;
    }
}
