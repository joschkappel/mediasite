<?php

namespace Tests\Feature\Livewire\Photo;

use App\Http\Livewire\Photo\PhotoIndex;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PhotoIndexTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PhotoIndex::class);

        $component->assertStatus(200);
    }
}
