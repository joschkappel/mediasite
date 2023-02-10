<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Project;
use Livewire\Component;

class ProjectInfo extends Component
{
    public Project $project;

    protected $listeners = ['getProject', 'clearProject'];

    public function getProject(Project $project)
    {
        $this->project = $project;
    }

    public function clearProject()
    {
        $this->project = new Project();
    }


    public function mount()
    {
        $this->project = new Project();
    }

    public function render()
    {
        return view('livewire.gallery.project-info');
    }
}
