<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Project;
use Livewire\Component;
use App\Models\Photo;
use Illuminate\Support\Collection;

class ProjectMedia extends Component
{
    public Project $project;
    public Photo $current_photo;
    public int $current_key;
    public int $max_key = 0;
    public Collection $photos;
    public Collection $carousel;


    public function leftclick()
    {
        if ($this->max_key > 0) {
            $this->current_key = abs(($this->current_key - 1) % ($this->max_key + 1));
            $this->current_photo = $this->carousel->get($this->current_key);
        }
    }
    public function rightclick()
    {
        if ($this->max_key > 0) {
            $this->current_key = ($this->current_key + 1) % ($this->max_key + 1);
            $this->current_photo = $this->carousel->get($this->current_key);
        }
    }

    public function getphoto($key)
    {
        if ($this->max_key > 0) {

            $this->current_key = $key;
            $this->current_photo = $this->carousel->get($this->current_key);
        }
    }

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->photos = $this->project->photos()->active()->whereNotIn('gallery_tag', ['carousel'])->get();
        $this->carousel = $this->project->photos()->active()->where('gallery_tag', 'carousel')->get();

        // if the template contains a carousel initialize it
        if ((collect($this->project->gallery_type->tags())->contains('carousel')) and
            ($this->carousel->count() > 0)
        ) {
            $this->current_key = 0;
            $this->max_key = $this->carousel->count() - 1;
            $this->current_photo = $this->carousel->get($this->current_key);
        } else {
            $this->current_key = 0;
            $this->max_key = 0;
        }
    }

    public function render()
    {

        return view('livewire.' . $this->project->gallery_type->template(), ['current_key' => $this->current_key])->layout('layouts.public');
    }
}
