<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Photo extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $appends = ['thumbnail'];

    public function registerMediaConversions(Media $media = null): void
    {

        if ($media != null) {
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
    }

    protected $fillable = [
        'name',
        'description',
        'gallery_position',
        'gallery_tag',
        'active',
        'show_on_main',
        'watermark',
        'watermark_color',
        'width',
        'height'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'active' => 'boolean',
        'show_on_main' => 'boolean'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
    public function scopeForMain($query)
    {
        return $query->where('active', true)->where('show_on_main', true);
    }

    /**
     * Get the thumbanil of the first media object
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function thumbnail(): Attribute
    {
        if ($this->hasMedia()) {
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
