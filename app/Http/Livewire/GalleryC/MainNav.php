<?php

namespace App\Http\Livewire\GalleryC;

use Livewire\Component;
use App\Enums\ProjectType;
use Illuminate\Support\Collection;
use App\Models\Project;



class MainNav extends Component
{
    public $project_types;
    public ProjectType $selected_type;

    public Collection $projects;
    public Project $selected_prj;

    protected $listeners = ['getProjects', 'getProject'];

    public function getProjects($pt)
    {
        $this->selected_type = ProjectType::from($pt);
        $this->projects = Project::whereType($pt)->get();
        $this->emit('clearProject');
    }
    public function getProject(Project $project)
    {
        $this->selected_prj = $project;
    }

    public function hydrate()
    {
        $this->project_types = Project::pluck('type')->unique()->sortBy('value');
    }

    public function setLocale($locale)
    {
        app()->setLocale($locale);
    }
    public function mount()
    {
        $this->project_types = Project::pluck('type')->unique()->sortBy('value');
        $this->projects = collect();
    }

    public function render()
    {
        return view('livewire.gallery-c.main-nav');
    }
}
