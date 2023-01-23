<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;

class ProjectPhotosIndex extends Component
{

    public $project;

    protected $listeners = [
        'showPhotos' => 'showPhotosForProject'
    ];

    public function showPhotosForProject($project_id)
    {
        $this->project = Project::find($project_id);
    }

    public function render()
    {
        return view('livewire.project.project-photos-index');
    }
}
