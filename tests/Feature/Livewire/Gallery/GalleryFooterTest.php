<?php

namespace Tests\Feature\Livewire\Gallery;

use App\Http\Livewire\Gallery\GalleryFooter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GalleryFooterTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(GalleryFooter::class);

        $component->assertStatus(200);
    }
}
