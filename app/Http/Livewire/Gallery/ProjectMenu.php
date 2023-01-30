<?php

namespace App\Http\Livewire\Gallery;

use App\Enums\ProjectType;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Collection;

class ProjectMenu extends Component
{


    public Collection $projects;


    public function mount()
    {
        $this->projects = collect();
        foreach (ProjectType::cases() as $p) {
            $this->projects->put($p->description(), Project::where('type', $p)->active()->get());
        }
    }

    public function render()
    {
        return view('livewire.gallery.project-menu');
    }
}
