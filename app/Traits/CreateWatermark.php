<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Spatie\Image\Image;
use App\Models\Photo;
use Spatie\Image\Manipulations;


trait CreateWatermark
{
    public function create_watermark_file(Photo $photo ): string
    {
        $font = 50;
        $wm_text = $photo->watermark;

        $im = @imagecreatetruecolor(strlen($wm_text) * $font / 1.5, $font * 1.5);
        imagesavealpha($im, true);
        imagealphablending($im, false);

        $white = imagecolorallocatealpha($im, 255, 255, 255, 127);
        imagefill($im, 0, 0, $white);

        if ($photo->watermark_color == 'l'){
            $wm_color = imagecolorallocate($im, 204,255, 51); // lime
        } elseif ($photo->watermark_color == 'w') {
            $wm_color = imagecolorallocate($im, 255,255, 255); // white
        } else {
            $wm_color = imagecolorallocate($im, 0,0, 0); // black
        }

        imagettftext( $im, $font, 0, 0, $font -3, $wm_color, storage_path("app/fonts/Chalkboard.ttc"), $wm_text);

        $wm_file = storage_path('app/watermarks/'.$photo->name.'.png');
        imagepng($im, $wm_file );


        return $wm_file;

    }

    public function watermark_image($photo_file, Photo $photo)
    {

        $wm_file = $this->create_watermark_file($photo);

        // modifying the image by adding a watermark
        Image::load($photo_file)
            ->watermark( $wm_file )
            ->watermarkOpacity(60)
            ->watermarkPosition(Manipulations::POSITION_BOTTOM)
            ->watermarkHeight(50, Manipulations::UNIT_PERCENT)
            ->watermarkWidth(100, Manipulations::UNIT_PERCENT)
            ->watermarkPadding(10, 10, Manipulations::UNIT_PERCENT)
            ->watermarkFit(Manipulations::FIT_MAX)
            ->save();

        File::delete( $wm_file );
    }
}
