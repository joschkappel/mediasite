<?php

namespace App\Http\Livewire\Photo;

use Livewire\Component;
use App\Models\Photo;
use App\Models\Project;
use App\Traits\CreateWatermark;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;


class PhotoUploadBatch extends Component
{
    use WithFileUploads, CreateWatermark;

    public Project $project;
    public $photos;
    public $metadata = [];
    public $tags;

    public function save()
    {
        ini_set('memory_limit', '512M');

        $validData = $this->validate([
            'metadata' => 'array|size:' . count($this->photos),
            'metadata.*' => 'array:name,description,tag',
            'metadata.*.name' => 'sometimes|string',
            'metadata.*.description' => 'sometimes|string',
            'metadata.*.tag' => [
                'required',
                Rule::in($this->tags),
            ],

        ]);

        Log::info('got picture files:', ['cnt' => count($this->photos)]);

        foreach ($this->photos as $key => $p) {
            $photo = $this->project->photos()->where('gallery_tag', $this->metadata[$key]['tag'] ?? 'carousel')->doesntHave('media')->first();
            [$width, $height] = $this->getDimensions($p->path()); // here we get a width/height

            if ($photo) {
                $photo->update([
                    'width' => $width,
                    'height' => $height,
                    'name' => $this->metadata[$key]['name'] ?? 'missing',
                    'description' => $this->metadata[$key]['description'] ?? ''
                ]);
            } else {
                $photo = Photo::create([
                    'width' => $width,
                    'height' => $height,
                    'name' => $this->metadata[$key]['name'] ?? 'missing',
                    'description' => $this->metadata[$key]['description'] ?? '',
                    'gallery_tag' => $this->metadata[$key]['tag'] ?? 'carousel'
                ]);
                $photo->project()->associate($this->project);
            }
            $photo->addMedia($p->path())
                ->withResponsiveImages()
                ->toMediaCollection();
        }
        return redirect()->route('photo.index');
    }
    public function deleteProfilePhoto()
    {
        $this->photos = [];
        $this->metadata = [];
    }

    public function mount()
    {
        $this->photos = array();
        $this->tags = $this->project->gallery_type->tags();
    }

    public function render()
    {
        return view('livewire.photo.upload-batch');
    }
}
