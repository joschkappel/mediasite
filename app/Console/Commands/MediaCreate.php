<?php

namespace App\Console\Commands;

use App\Enums\GalleryType;
use Illuminate\Console\Command;
use App\Models\Project;
use App\Traits\MediaFaker;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Arr;

class MediaCreate extends Command
{
    use MediaFaker;
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
                ['active' => true],
                ['active' => true],
                ['active' => false],
            ))
            ->sequence(fn ($sequence) => ['menu_position' => $sequence->index])
            ->sequence(fn ($sequence) => ['gallery_type' => GalleryType::from($sequence->index % 4)])
            ->sequence(fn ($sequence) => ['carousel_size' => Arr::random([3, 4, 5, 6, 7, 8])])
            ->create();
        $this->info($projects->count() . ' projects created');

        foreach ($projects as $prj) {
            $alternate = true;
            foreach ($prj->photos as $p) {
                [$image, $width, $height] = $this->attachFakeMedia($p, $alternate);
                Log::info('fake image created', ['image' => $image]);
                Log::info('fake image size', ['size' => $width . '*' . $height]);

                $alternate = !$alternate;

                $p->update([
                    'name' => fake()->words(2, true),
                    'description' => fake()->text(),
                    'active' => true,
                    'width' => $width,
                    'height' => $height,
                ]);
            }
            $prj->photos->random()->update(['show_on_main' => true]);
            $this->info($prj->photos->count() . ' media files created');
        }
        return Command::SUCCESS;
    }
}
