<?php

namespace Tests\Feature\Livewire\Project;

use App\Http\Livewire\Project\ProjectPhotosIndex;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectPhotosIndexTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ProjectPhotosIndex::class);

        $component->assertStatus(200);
    }
}
