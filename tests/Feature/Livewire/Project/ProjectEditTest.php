<?php

namespace Tests\Feature\Livewire\Project;

use App\Http\Livewire\Project\ProjectEdit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectEditTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ProjectEdit::class);

        $component->assertStatus(200);
    }
}
