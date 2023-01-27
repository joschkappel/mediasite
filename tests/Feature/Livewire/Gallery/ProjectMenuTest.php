<?php

namespace Tests\Feature\Livewire\Gallery;

use App\Http\Livewire\Gallery\ProjectMenu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectMenuTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ProjectMenu::class);

        $component->assertStatus(200);
    }
}
