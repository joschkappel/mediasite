<?php

namespace App\Http\Livewire\Project;

use App\Enums\ProjectType;
use App\Enums\GalleryType;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Log;

class ProjectCreate extends Component
{

    public $name;
    public $type;
    public $gallery_type;
    public $info_time, $info_de, $info_en;
    public $watermark;
    public $menu_position;
    public $positions;
    public $set_positions;


    public function mount()
    {
        $this->type = ProjectType::PHOTOS;
        $this->gallery_type = GalleryType::CAROUSEL;
        $this->positions = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $this->set_positions = Project::where('type', $this->type)->pluck('menu_position');
        $this->menu_position = $this->positions->diff($this->set_positions)->first();
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
            'gallery_type' => ['required', new Enum(GalleryType::class)],
            'menu_position' => 'required|integer|between:1,10',
            'info_time' => 'required|max:40',
            'info_de' => 'required_without:info_en|max:400',
            'info_en' => 'required_without:info_de|max:400',
            'watermark' => 'nullable|sometimes|string|max:20',
        ]);
        Log::info($validData);
        Project::create($validData);
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.project.project-create');
    }
}
