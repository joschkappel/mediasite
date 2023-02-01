<?php

namespace Tests\Feature\Livewire\Photo;

use App\Http\Livewire\Photo\PhotoUpload;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PhotoUploadTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $project = Project::factory()->create();
        $component = Livewire::test(PhotoUpload::class, ['project' => $project]);

        $component->assertStatus(200);
    }
}
