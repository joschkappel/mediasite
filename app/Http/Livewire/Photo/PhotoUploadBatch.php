<?php

namespace App\Http\Livewire\Photo;

use Livewire\Component;
use App\Models\Photo;
use App\Models\Project;
use App\Traits\CreateWatermark;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class PhotoUploadBatch extends Component
{
    use WithFileUploads, CreateWatermark;

    public Project $project;
    public $selectedMedia;
    public $photos = [];
    public $assignedMedia;


    public function save()
    {
        ini_set('memory_limit', '512M');

        $validData = $this->validate([
            'assignedMedia' => 'array|max:' . count($this->photos),
            'photos' => 'array',
            'photos.*.id' => 'sometimes|exists:photos',
            'photos.*.name' => 'sometimes|string',
            'photos.*.description' => 'sometimes|string',
        ]);

        Log::info('assigned picture files:', ['cnt' => count($this->assignedMedia)]);

        foreach ($this->assignedMedia as $m => $p) {
            if ($p != null) {
                $photo = Photo::find($p);
                $metadata = collect($validData['photos'])->where('id', $p)->first();

                // is a media file assigned
                $media_file = $this->selectedMedia[$m];
                [$width, $height] = $this->getDimensions($media_file->path()); // here we get a width/height

                $photo->update([
                    'width' => $width ?? null,
                    'height' => $height ?? null,
                    'name' => $metadata['name'] ?? 'missing',
                    'description' => $metadata['description'] ?? ''
                ]);

                $photo->addMedia($media_file->path())
                    ->withResponsiveImages()
                    ->toMediaCollection();
            }
        }
        return redirect()->route('dashboard');
    }
    public function deleteProfilePhoto()
    {
        $this->selectedMedia = [];
        $this->assignedMedia = [];
    }

    public function mount()
    {
        $this->selectedMedia = [];
        $this->assignedMedia = [];
        $this->photos = $this->project->photos()->doesntHave('media')->get()->toArray();
    }

    public function render()
    {
        Log::info('media file state', ['selected' => $this->selectedMedia, 'assigned' => $this->assignedMedia]);
        return view('livewire.photo.upload-batch');
    }
}
