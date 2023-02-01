<?php

namespace Tests\Feature\Livewire\Photo;

use App\Http\Livewire\Gallery\Gallery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GalleryTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Gallery::class);

        $component->assertStatus(200);
    }
}
