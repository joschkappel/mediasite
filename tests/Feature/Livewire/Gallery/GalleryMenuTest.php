<?php

namespace Tests\Feature\Livewire\Gallery;

use App\Http\Livewire\Gallery\GalleryMenu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GalleryMenuTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(GalleryMenu::class);

        $component->assertStatus(200);
    }
}
