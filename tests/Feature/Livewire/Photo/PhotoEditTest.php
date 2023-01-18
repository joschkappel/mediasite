<?php

namespace Tests\Feature\Livewire\Photo;

use App\Http\Livewire\Photo\PhotoEdit;
use App\Models\Photo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PhotoEditTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $photo = Photo::factory()->create();

        $component = Livewire::test(PhotoEdit::class, ['photo'=>$photo]);

        $component->assertStatus(200);
    }
}
