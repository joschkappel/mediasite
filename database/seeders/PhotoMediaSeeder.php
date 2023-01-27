<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class PhotoMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a project
        $project = Project::factory()->create();

        // create photo
        $photos = Photo::factory()
            ->count(3)
            ->for($project)
            ->create();

        // create image file
        // and attach media
        $dir = public_path('media');

        foreach ($photos as $p) {
            $image = FakerPicsumImagesProvider::image($dir, 600, 400);
            $p->addMedia($image)
                ->usingName($p->name)
                ->withResponsiveImages()
                ->toMediaCollection();
        }
    }
}
