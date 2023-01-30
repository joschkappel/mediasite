<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Photo;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Gallery extends Component
{


    public function render()
    {
        return view('livewire.gallery.gallery')->layout('layouts.guest');
    }
}
