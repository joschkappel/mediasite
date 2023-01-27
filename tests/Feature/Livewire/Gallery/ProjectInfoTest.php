<?php

namespace Tests\Feature\Livewire\Gallery;

use App\Http\Livewire\Gallery\ProjectInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectInfoTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ProjectInfo::class);

        $component->assertStatus(200);
    }
}
