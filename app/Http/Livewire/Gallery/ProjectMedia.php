<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Project;
use Livewire\Component;
use App\Models\Photo;
use Illuminate\Support\Collection;

class ProjectMedia extends Component
{
    public Project $project;
    public Photo $current_photo;
    public int $current_key;
    public Collection $photos;
    public $clickedat;

    public function leftclick()
    {
        $this->clickedat = 'LEFT';
        $this->current_key = abs(($this->current_key - 1) % $this->photos->count());
        $this->current_photo = $this->photos->get($this->current_key);
    }
    public function rightclick()
    {
        $this->clickedat = 'RIGHT';
        $this->current_key = ($this->current_key + 1) % $this->photos->count();
        $this->current_photo = $this->photos->get($this->current_key);
    }

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->photos = $this->project->photos()->active()->get();
        $this->current_key = 0;
        $this->current_photo = $this->photos->get($this->current_key);
    }

    public function render()
    {

        return view('livewire.gallery.project-media')->layout('layouts.public');
    }
}
