<?php

namespace App\Http\Livewire\GalleryB;

use App\Models\Project;
use Livewire\Component;

class ProjectInfo extends Component
{
    public Project $project;
    public $locale;

    protected $listeners = ['getProject', 'clearProject', 'setLocale'];

    public function getProject(Project $project)
    {
        $this->project = $project;
    }

    public function clearProject()
    {
        $this->project = new Project();
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function mount()
    {
        $this->project = new Project();
        $this->locale = app()->getLocale();
    }

    public function render()
    {
        return view('livewire.gallery-b.project-info');
    }
}
