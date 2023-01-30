<?php

namespace App\Http\Livewire\Photo;

use Livewire\Component;
use App\Models\Photo;
use App\Models\Project;
use App\Traits\CreateWatermark;
use Livewire\WithFileUploads;


class PhotoUpload extends Component
{
    use WithFileUploads, CreateWatermark;

    public Project $project;

    public $photo;
    public $name;
    public $description;
    public $watermark;
    public $watermark_color;

    protected $rules = [
        'photo' => 'image|max:2048', // 2MB Max
        'name' => 'required|string',
        'description' => 'required|string',
        'watermark' => 'nullable|sometimes|string',
        'watermark_color' => 'nullable|sometimes|required_with:watermark',
    ];

    public function deleteProfilePhoto()
    {
        $this->photo = null;
    }
    public function save()
    {
        $validData = $this->validate();

        // $filename = $this->photo->store('media');
        $saved_photo = $this->project->photos()->create([
            'name' => $this->name,
            'tags' => '#protr',
            'description' => $this->description,
            'watermark' => $this->watermark,
            'watermark_color' => $this->watermark_color,
            'active' => false,
        ]);
        $saved_photo->project()->associate($this->project);

        // add a watermark to the image
        if ($saved_photo->watermark) {
            $this->watermark_image($this->photo->path(), $saved_photo);
        }

        $saved_photo->addMedia($this->photo->path())
            ->usingName($this->name)
            ->withResponsiveImages()
            ->toMediaCollection();



        return redirect()->route('photo.index');
    }

    public function render()
    {
        return view('livewire.photo.upload');
    }
}
