<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;

class ProjectIndex extends Component
{

    public function render()
    {
        return view('livewire.project.project-index');
    }
}
