<?php

namespace App\Enums;

use Ramsey\Uuid\Type\Integer;

enum GalleryType: int
{
    case CAROUSEL =  0;
    case CAROUSEL_THREE_PICS = 1;
    case SWIPER = 2;
    case PHOTOSWIPE = 3;


    public function description(): string
    {
        return __('gallerytype.' . $this->name . '.description');
    }
    public function template(): string
    {
        switch ($this) {
            case self::CAROUSEL:
                return ('gallery.media-carousel');
                break;
            case self::PHOTOSWIPE:
                return ('gallery.media-photoswipe');
                break;
            case self::SWIPER:
                return ('gallery.media-swiper');
                break;
            case self::CAROUSEL_THREE_PICS:
                return ('gallery.media-carousel-3pic');
                break;
            default:
                return ('gallery.media-carousel');
                break;
        }
    }
    public function tags(): array
    {
        switch ($this) {
            case self::CAROUSEL:
            case self::SWIPER:
            case self::PHOTOSWIPE:
                return ['carousel'];
                break;
            case self::CAROUSEL_THREE_PICS:
                return ['pic1', 'pic2', 'pic3', 'carousel'];
                break;
            default:
                return ['carousel'];
                break;
        }
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
