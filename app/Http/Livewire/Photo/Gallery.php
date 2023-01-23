<?php

namespace App\Http\Livewire\Photo;

use App\Models\Photo;
use Illuminate\Support\Collection;
use Livewire\Component;

class Gallery extends Component
{

    public Collection $photos;

    public function mount()
    {
        $this->photos = Photo::formain()->get();
    }


    public function render()
    {
        return view('livewire.photo.gallery')->layout('layouts.guest');
    }
}
