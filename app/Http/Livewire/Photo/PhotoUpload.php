<?php

namespace App\Http\Livewire\Photo;

use Livewire\Component;
use App\Models\Photo;
use Livewire\WithFileUploads;

class PhotoUpload extends Component
{
    use WithFileUploads;

    public $photo;
    protected $rules = [
        'photo' => 'image|max:1024', // 1MB Max
    ];

    public function save()
    {
        $validData = $this->validate();

        $filename = $this->photo->store('media');
        Photo::create([
            'name' =>$this->photo,
            'file_name' => $filename,
            'file_url' => $filename,
            'tags' => '#protrait',
            'description' => 'testig'
        ]);
        return redirect()->route('photo.index');
    }

    public function render()
    {
        return view('livewire.photo.upload');
    }
}
