<?php

namespace App\Enums;

use Ramsey\Uuid\Type\Integer;

enum GalleryType: int
{
    case CAROUSEL =  0;
    case CAROUSEL_THREE_PICS = 1;


    public function description(): string
    {
        return __('gallerytype.' . $this->name . '.description');
    }

    static public function getFilterOptions(): array
    {
        $options = collect();
        foreach (self::cases() as $opt) {
            $options->put($opt->value, $opt->description());
        }
        return $options->toArray();
    }
}
