<?php

namespace App\Http\Livewire\Gallery;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Enums\ProjectType;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class MainNav extends Component
{
    public $project_types;
    public $selected_type;


    public function hydrate()
    {
        $this->project_types = Project::pluck('type')->unique()->sortBy('value');
    }

    public function mount()
    {
        $this->project_types = Project::pluck('type')->unique()->sortBy('value');
    }

    public function render()
    {
        return view('livewire.gallery.main-nav');
    }
}
