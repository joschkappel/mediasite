<?php

namespace Tests\Feature\Livewire\Gallery;

use App\Http\Livewire\Gallery\MainNav;
use Livewire\Livewire;
use Tests\TestCase;

class GalleryMenuTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(MainNav::class);

        $component->assertStatus(200);
    }
}
