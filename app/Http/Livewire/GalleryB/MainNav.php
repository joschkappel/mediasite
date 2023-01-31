<?php

namespace App\Http\Livewire\GalleryB;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Enums\ProjectType;
use App\Models\Project;



class MainNav extends Component
{
    public $project_types;
    public ProjectType $selected_type;

    protected $listeners = ['getProjects', 'setLocale'];

    public function getProjects($pt)
    {
        $this->selected_type = ProjectType::from($pt);
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
    }

    public function render()
    {
        return view('livewire.gallery-b.main-nav');
    }
}
