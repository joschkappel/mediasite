<?php

namespace App\Http\Livewire\GalleryB;

use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        return view('livewire.gallery-b.gallery')->layout('layouts.guest');
    }
}
