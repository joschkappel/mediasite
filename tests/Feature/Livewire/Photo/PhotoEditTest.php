<?php

namespace Tests\Feature\Livewire\Photo;

use App\Http\Livewire\Photo\PhotoEdit;
use App\Models\Photo;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PhotoEditTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $project = Project::factory()->create();
        $photo = Photo::factory()->make();
        $project->photos()->create($photo->toArray());

        $component = Livewire::test(PhotoEdit::class, ['photo' => $photo]);

        $component->assertStatus(200);
    }
}
