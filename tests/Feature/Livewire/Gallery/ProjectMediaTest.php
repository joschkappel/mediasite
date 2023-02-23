<?php

namespace Tests\Feature\Livewire\Gallery;

use App\Http\Livewire\Gallery\ProjectMedia;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectMediaTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $project = Project::factory()->attachMedia()->create();
        $component = Livewire::test(ProjectMedia::class, ['project' => $project]);

        $component->assertStatus(200);
    }
}
