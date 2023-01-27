<?php

namespace App\Http\Livewire\Project;

use App\Enums\ProjectType;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Log;

class ProjectEdit extends Component
{
    public $name;
    public $type;
    public $info_time, $info_de, $info_en;
    public $watermark;
    public $menu_position;
    public $positions;
    public $active;
    public $set_positions;
    public Project $project;

    public function mount(Project $project)
    {
        $this->project = Project::find($project->id);
        $this->type = $project->type;
        $this->name = $project->name;
        $this->info_time = $project->info_time;
        $this->info_de = $project->info_de;
        $this->info_en = $project->info_en;
        $this->watermark = $project->watermark;
        $this->active = $project->active;

        $this->positions = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $this->set_positions = Project::where('type', $this->type)->whereNot('id', $project->id)->pluck('menu_position');

        $this->menu_position = $project->menu_position;
    }
    public function setPosition($new_position)
    {
        $this->menu_position = $new_position;
    }
    public function releasePosition()
    {
        $this->menu_position = null;
    }
    public function save()
    {
        $validData = $this->validate([
            'name' => 'required|string|max:20',
            'type' => ['required', new Enum(ProjectType::class)],
            'menu_position' => 'required|integer|between:1,10',
            'info_time' => 'required|max:40',
            'info_de' => 'required_without:info_en|max:400',
            'info_en' => 'required_without:info_de|max:400',
            'watermark' => 'nullable|sometimes|string|max:20',
            'active' => 'required|boolean'
        ]);
        Log::info($validData);
        $this->project->update($validData);
        $this->emit('updated');
    }
    public function render()
    {
        return view('livewire.project.project-edit');
    }
}
