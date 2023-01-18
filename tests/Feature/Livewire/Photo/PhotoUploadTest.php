<?php

namespace Tests\Feature\Livewire\Photo;

use App\Http\Livewire\Photo\PhotoUpload;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PhotoUploadTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PhotoUpload::class);

        $component->assertStatus(200);
    }
}
