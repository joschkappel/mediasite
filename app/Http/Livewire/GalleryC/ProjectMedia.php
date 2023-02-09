<?php

namespace App\Http\Livewire\GalleryC;

use App\Models\Project;
use Livewire\Component;
use App\Models\Photo;
use Illuminate\Support\Collection;

class ProjectMedia extends Component
{
    public Project $project;
    public Collection $photos;

    protected $listeners = ['getProject', 'clearProject'];

    public function clearProject()
    {
        $this->project = new Project();
    }
    public function getProject(Project $new_project)
    {
        if ($new_project->id != null) {
            $this->project = $new_project;
        } else {
            $this->project = new Project();
        }
    }

    public function mount()
    {
        $this->project = new Project();
    }

    public function render()
    {
        if ($this->project->id == null) {
            $this->photos = Photo::formain()->get();
        } else {
            $this->photos = $this->project->photos()->active()->get();
        }
        return view('livewire.gallery-c.project-media');
    }
}
