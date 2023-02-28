<?php

namespace App\Http\Livewire\Gallery;

use App\Enums\ProjectType;
use App\Models\Project;

use Illuminate\Support\Collection;
use Livewire\Component;

class ProjectMenu extends Component
{
    public Collection $projects;
    public Project $selected_prj;
    public $project_type;

    protected $listeners = ['getProject'];

    public function getProject(Project $project)
    {
        $this->selected_prj = $project;
    }



    public function mount($project_type = null)
    {
        if ($project_type == null) {
            $project_type = ProjectType::PHOTOS->value;
        }
        $this->project_type = $project_type;
        $this->projects = Project::active()->whereType($project_type)->with('photos')->orderBy('menu_position')->get()->where('has_active_photos', true);
    }
    public function render()
    {
        return view('livewire.gallery.project-menu')->layout('layouts.public');
    }
}
