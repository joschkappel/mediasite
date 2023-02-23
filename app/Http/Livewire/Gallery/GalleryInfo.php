<?php

namespace App\Http\Livewire\Gallery;

use App\Traits\LogVisitor;
use Livewire\Component;

class GalleryInfo extends Component
{
    use LogVisitor;

    public function render()
    {
        $this->incrementPagehits('livewire.gallery.gallery-info', null);
        return view('livewire.gallery.gallery-info')->layout('layouts.public');
    }
}
