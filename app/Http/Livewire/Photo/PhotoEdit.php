<?php

namespace App\Http\Livewire\Photo;

use App\Models\Photo;
use App\Enums\GalleryType;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rule;
use Livewire\Component;

class PhotoEdit extends Component
{
    public Photo $photo;
    public $name, $description, $active, $show_on_main, $watermark_color, $gallery_type, $gallery_position;

    public function update()
    {
        $validData = $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'active' => 'required|boolean',
            'show_on_main' => 'required|boolean',
            // 'gallery_position' => ['required',  Rule::unique('photos')->where(fn ($query) => $query->where('project_id', $this->photo->project_id))]
        ]);

        // $filename = $this->photo->store('media');
        $saved_photo = $this->photo->update($validData);

        // there MUST be only one shown on main
        if ($validData['show_on_main']) {
            $project = $this->photo->project;
            Photo::where('project_id', $project->id)
                ->whereNot('id', $this->photo->id)
                ->update(['show_on_main' => false]);
        }

        return redirect()->route('photo.index');
    }
    public function cancel()
    {
        return redirect()->route('photo.index');
    }
    public function render()
    {
        $this->name = $this->photo->name;
        $this->description = $this->photo->description;
        $this->active = $this->photo->active;
        $this->show_on_main = $this->photo->show_on_main;
        $this->watermark_color = $this->photo->watermark_color;

        return view('livewire.photo.photo-edit');
    }
}
