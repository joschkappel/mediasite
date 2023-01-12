<?php

namespace App\Http\Livewire\Photo;

use App\Models\Photo;
use Livewire\Component;

class PhotoEdit extends Component
{
    public Photo $photo;
    public $name, $description;

    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string'
    ];
    public function update()
    {
        $validData = $this->validate();

       // $filename = $this->photo->store('media');
        $saved_photo = $this->photo->update([
            'name' =>$this->name,
            'description' => $this->description
        ]);

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
        return view('livewire.photo.photo-edit');
    }
}
