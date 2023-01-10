<?php

namespace App\Http\Livewire\Photo;

use Livewire\Component;
use App\Models\Photo;
use Livewire\WithFileUploads;

class PhotoUpload extends Component
{
    use WithFileUploads;

    public $photo;
    public $name;
    public $description;

    protected $rules = [
        'photo' => 'image|max:1024', // 1MB Max
        'name' => 'required|string',
        'description' => 'required|string'
    ];

    public function deleteProfilePhoto()
    {
        $this->photo = null;
    }
    public function save()
    {
        $validData = $this->validate();

       // $filename = $this->photo->store('media');
        $saved_photo = Photo::create([
            'name' =>$this->name,
            'tags' => '#protr',
            'description' => $this->description
        ]);

        $saved_photo->addMedia( $this->photo->path())
                    ->toMediaCollection();

        return redirect()->route('photo.index');
    }

    public function render()
    {
        return view('livewire.photo.upload');
    }
}
