<?php

namespace App\Http\Livewire\Gallery;

use Livewire\Component;

class GalleryInfo extends Component
{
    public function render()
    {
        return view('livewire.gallery.gallery-info')->layout('layouts.public');
    }
}
