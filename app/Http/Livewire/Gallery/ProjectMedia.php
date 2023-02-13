<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Project;
use Livewire\Component;
use App\Models\Photo;
use Illuminate\Support\Collection;

class ProjectMedia extends Component
{
    public Project $project;
    public Collection $photos;


    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        if ($this->project->id == null) {
            $this->photos = Photo::formain()->get();
        } else {
            $this->photos = $this->project->photos()->active()->get();
        }
        return view('livewire.gallery.project-media')->layout('layouts.guest');
    }
}
