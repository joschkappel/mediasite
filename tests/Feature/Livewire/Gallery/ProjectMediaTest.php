<?php

namespace Tests\Feature\Livewire\Gallery;

use App\Http\Livewire\Gallery\ProjectMedia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectMediaTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ProjectMedia::class);

        $component->assertStatus(200);
    }
}
