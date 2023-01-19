<?php

namespace Database\Factories;

use App\Enums\ProjectType;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => fake()->name(),
            'type' => ProjectType::PHOTOS,
            'info_time' => '2022',
            'info_de' => fake()->text(),
            'info_en' => fake()->text(),
            'sort_order_no' => 1,
            'watermark' => fake()->name()
        ];
    }
}
