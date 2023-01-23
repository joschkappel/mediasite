<?php

namespace Database\Factories;

use App\Enums\ProjectType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
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
            'info_time' => fake()->year('-10 years'),
            'info_de' => fake()->text(350),
            'info_en' => fake()->text(350),
            'menu_position' => Arr::random([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'watermark' => fake()->words(3, true)
        ];
    }
}
