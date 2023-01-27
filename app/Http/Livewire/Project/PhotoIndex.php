<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;

class PhotoIndex extends Component
{

    public $project;

    protected $listeners = [
        'showPhotos' => 'showPhotosForProject'
    ];

    public function showPhotosForProject(Project $project)
    {
        $this->project = $project;
    }

    public function mount()
    {
        $this->project = new Project();
    }

    public function render()
    {
        return view('livewire.project.photo-index');
    }
}
