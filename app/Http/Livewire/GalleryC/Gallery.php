<?php

namespace App\Http\Livewire\GalleryC;

use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        return view('livewire.gallery-c.gallery')->layout('layouts.guest');
    }
}
