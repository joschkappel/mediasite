<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Photo extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $appends = ['thumbnail'];

    public function registerMediaConversions(Media $media = null): void
    {

        $this->addMediaConversion('thumb')
              ->width(100)
              ->height(75)
              ->sharpen(10)
              ->nonQueued();

        $this->addMediaConversion('preview')
            ->width(400)
            ->height(300)
            ->nonQueued();


    }

    protected $fillable = [
        'name',
        'description',
        'tags',
        'active',
        'watermark',
        'watermark_color',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'active' => 'boolean'
    ];

    /**
     * Get the thumbanil of the first media object
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function thumbnail(): Attribute
    {
        if ($this->hasMedia()){
            return Attribute::make(
                get: fn () => $this->getFirstMedia()->getUrl('thumb')
            )->shouldCache();
        } else {
            return Attribute::make(
                get: fn () => public_path('errors/404_not_found.jpg')
            )->shouldCache();
        }
    }
}
