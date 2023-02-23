<?php

namespace Tests\Feature\Livewire\Gallery;

use App\Http\Livewire\Gallery\Footer;
use Livewire\Livewire;
use Tests\TestCase;

class GalleryFooterTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Footer::class);

        $component->assertStatus(200);
    }
}
