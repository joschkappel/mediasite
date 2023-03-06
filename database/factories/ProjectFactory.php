<?php

namespace Database\Factories;

use App\Enums\ProjectType;
use App\Enums\GalleryType;
use App\Models\Project;
use App\Traits\MediaFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    use MediaFaker;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'type' => collect(ProjectType::cases())->random(),
            'gallery_type' => collect(GalleryType::cases())->random(),
            'carousel_size' => config('mediasite.carousel_photos'),
            'info_time' => fake()->year('-10 years'),
            'info_de' => fake()->text(350),
            'info_en' => fake()->text(350),
            'menu_position' => Arr::random([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
        ];
    }

    public function attachMedia()
    {
        return $this->afterCreating(function (Project $project) {
            foreach ($project->photos as $p) {
                [$image, $width, $height] = $this->attachFakeMedia($p, true);

                $p->update([
                    'name' => fake()->words(2, true),
                    'description' => fake()->text(),
                    'active' => true,
                    'width' => $width,
                    'height' => $height,
                ]);
            }
        });
    }
}
