<?php

namespace App\Http\Livewire\Photo;

use App\Models\Photo;
use App\Traits\CreateWatermark;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Livewire\Component;

class PhotoEdit extends Component
{
    use WithFileUploads, CreateWatermark;

    public Photo $photo;
    public $photoimg;
    public $tags;
    public $name, $description, $active, $show_on_main, $watermark_color, $gallery_type, $gallery_position, $gallery_tag;

    public function deleteMedia()
    {
        $this->photoimg = null;
    }
    public function update()
    {
        $validData = $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'active' => 'required|boolean',
            'show_on_main' => 'required|boolean',
            'gallery_tag' => [
                'required',
                Rule::in($this->tags),
            ]
            // 'gallery_position' => ['required',  Rule::unique('photos')->where(fn ($query) => $query->where('project_id', $this->photo->project_id))]
        ]);

        $saved_photo = $this->photo->update($validData);
        $this->photo->refresh();

        // there MUST be only one shown on main
        if ($validData['show_on_main']) {
            $project = $this->photo->project;
            Photo::where('project_id', $project->id)
                ->whereNot('id', $this->photo->id)
                ->update(['show_on_main' => false]);
        }

        // add a watermark and media to the image
        if (
            $this->photo->watermark
            and config('mediasite.watermarking', false)
            and ($this->photoimg != null)
        ) {
            $this->watermark_image($this->photoimg->path(), $this->photo);
        }

        if ($this->photoimg != null) {
            $this->photo->addMedia($this->photoimg->path())
                ->usingName($this->name)
                ->withResponsiveImages()
                ->toMediaCollection();
            $this->photo->refresh();
        }

        // last check if phot doesn have media it cant be active
        if (!$this->photo->hasMedia()) {
            $this->photo->update([
                'active' => false,
                'show_on_main' => false
            ]);
        }

        return redirect()->route('photo.index');
    }
    public function cancel()
    {
        return redirect()->route('photo.index');
    }
    public function mount()
    {
        $this->name = $this->photo->name;
        $this->description = $this->photo->description;
        $this->active = $this->photo->active;
        $this->show_on_main = $this->photo->show_on_main;
        $this->watermark_color = $this->photo->watermark_color;
        $this->gallery_tag = $this->photo->gallery_tag;

        $this->tags = $this->photo->project->gallery_type->tags();
    }
    public function render()
    {
        return view('livewire.photo.photo-edit');
    }
}
