<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Photo;
use Illuminate\Support\Collection;
use Livewire\Component;

class GalleryWireframe1 extends Component
{

    public Collection $photos;

    public function mount()
    {
        $this->photos = Photo::formain()->get();
    }


    public function render()
    {
        return view('livewire.gallery.gallery-wireframe1')->layout('layouts.guest');
    }
}
