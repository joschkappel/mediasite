<?php

namespace Tests\Feature\Livewire\Gallery;

use App\Http\Livewire\Gallery\GalleryInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GalleryInfoTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(GalleryInfo::class);

        $component->assertStatus(200);
    }
}
