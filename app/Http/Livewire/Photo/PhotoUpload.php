<?php

namespace App\Http\Livewire\Photo;

use Livewire\Component;
use App\Models\Photo;
use Livewire\WithFileUploads;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;


class PhotoUpload extends Component
{
    use WithFileUploads;

    public $photo;
    public $name;
    public $description;

    protected $rules = [
        'photo' => 'image|max:2048', // 1MB Max
        'name' => 'required|string',
        'description' => 'required|string'
    ];

    public function deleteProfilePhoto()
    {
        $this->photo = null;
    }
    public function save()
    {
        $validData = $this->validate();

       // $filename = $this->photo->store('media');
        $saved_photo = Photo::create([
            'name' =>$this->name,
            'tags' => '#protr',
            'description' => $this->description
        ]);

        // modifying the image by adding a watermark
        Image::load($this->photo->path())
            ->watermark(storage_path('app/public/JKwatermark.png'))
            ->watermarkOpacity(60)
            ->watermarkPosition(Manipulations::POSITION_TOP_RIGHT)
            ->watermarkHeight(10, Manipulations::UNIT_PERCENT)
            ->watermarkWidth(10, Manipulations::UNIT_PERCENT)
            ->watermarkPadding(10, 10, Manipulations::UNIT_PERCENT)
            ->watermarkFit(Manipulations::FIT_STRETCH)
            ->save();

        $saved_photo->addMedia( $this->photo->path())
                    ->usingName($this->name)
                    ->withResponsiveImages()
                    ->toMediaCollection();

        return redirect()->route('photo.index');
    }

    public function render()
    {
        return view('livewire.photo.upload');
    }
}
