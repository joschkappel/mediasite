<?php

namespace App\Http\Livewire\Photo;

use App\Models\Photo;
use Livewire\Component;

class PhotoEdit extends Component
{
    public Photo $photo;
    public $name, $description, $active, $show_on_main, $watermark_color;

    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
        'active' => 'required|boolean',
        'show_on_main' => 'required|boolean',
    ];
    public function update()
    {
        $validData = $this->validate();

        // $filename = $this->photo->store('media');
        $saved_photo = $this->photo->update($validData);

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
