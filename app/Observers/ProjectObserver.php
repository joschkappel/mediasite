<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        $tags = collect($project->gallery_type->tags());
        foreach ($tags as $tag) {
            if ($tag == 'carousel') {
                for ($i = 0; $i < config('mediasite.carousel_photos', 5); $i++) {
                    $saved_photo = $project->photos()->create([
                        'gallery_tag' => $tag,
                        'gallery_position' => $i,
                        'name' => 'please add image file',
                        'description' => 'placeholder',
                        'active' => false,
                        'show_on_main' => false,
                    ]);
                    $saved_photo->project()->associate($project);
                }
            } else {
                $saved_photo = $project->photos()->create([
                    'gallery_tag' => $tag,
                    'description' => 'placeholder',
                    'name' => 'please add image file',
                    'active' => false,
                    'show_on_main' => false,
                ]);
                $saved_photo->project()->associate($project);
            }
        }
    }

    /**
     * Handle the Project "updated" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function updated(Project $project)
    {
        //
    }

    /**
     * Handle the Project "deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function deleted(Project $project)
    {
        //
    }

    /**
     * Handle the Project "restored" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function restored(Project $project)
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }
}
