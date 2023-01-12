<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\PhotoEdit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PhotoEditTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PhotoEdit::class);

        $component->assertStatus(200);
    }
}
