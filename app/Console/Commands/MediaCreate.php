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
    protected $signature = 'media:create {--P|projects=2}';

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

        // create N projects
        $projects = Project::factory()
            ->count($num_prj)
            ->state(new Sequence(
                ['active' => true],
                ['active' => false],
            ))
            ->sequence(fn ($sequence) => ['menu_position' => $sequence->index])
            ->create();
        $this->info($projects->count() . ' projects created');
        $dir = public_path('media');

        foreach ($projects as $prj) {
            $alternate = true;
            foreach ($prj->photos as $p) {
                $p->update([
                    'name' => fake()->words(2, true),
                    'description' => fake()->text(),
                    'active' => true,
                ]);

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
            $prj->photos->random()->update(['show_on_main' => true]);
            $this->info($prj->photos->count() . ' media files created');
        }
        return Command::SUCCESS;
    }
}
