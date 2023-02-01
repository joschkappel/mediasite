<?php

namespace App\Http\Livewire\GalleryB;

use App\Models\Project;

use Illuminate\Support\Collection;
use Livewire\Component;

class ProjectMenu extends Component
{
    public Collection $projects;
    public Project $selected_prj;

    protected $listeners = ['getProjects', 'getProject'];

    public function getProject(Project $project)
    {
        $this->selected_prj = $project;
    }

    public function getProjects($pt)
    {
        $this->projects = Project::whereType($pt)->get();
        $this->emit('clearProject');
    }

    public function mount()
    {
        $this->projects = collect();
    }
    public function render()
    {
        return view('livewire.gallery-b.project-menu');
    }
}
