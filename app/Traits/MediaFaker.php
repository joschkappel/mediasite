<?php

namespace App\Traits;

use App\Models\Photo;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;
use App\Traits\CreateWatermark;

trait MediaFaker
{

    use CreateWatermark;

    private function attachFakeMedia(Photo $photo, bool $portrait): array
    {
        $dir = public_path('media');

        if ($portrait) {
            $image = FakerPicsumImagesProvider::image($dir, 1280, 960);
        } else {
            $image = FakerPicsumImagesProvider::image($dir, 960, 1280);
        }
        [$width, $height] = $this->getDimensions($image); // here we get a width/height

        $photo->addMedia($image)
            ->withResponsiveImages()
            ->toMediaCollection();
        return [$image, $width, $height];
    }
}
