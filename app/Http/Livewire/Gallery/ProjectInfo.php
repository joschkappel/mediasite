<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Project;
use Livewire\Component;

class ProjectInfo extends Component
{
    public Project $project;

    protected $listeners = ['setNewProject' => 'refreshProject'];

    public function refreshProject(Project $new_project)
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
        return view('livewire.gallery.project-info');
    }
}
