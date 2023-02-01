<?php

namespace Tests\Feature\Livewire\Project;

use App\Http\Livewire\Project\ProjectEdit;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectEditTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $project = Project::factory()->create();

        $component = Livewire::test(ProjectEdit::class, ['project' => $project]);

        $component->assertStatus(200);
    }
}
