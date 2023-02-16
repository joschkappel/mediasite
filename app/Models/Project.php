<?php

namespace App\Models;

use App\Enums\ProjectType;
use App\Enums\GalleryType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'gallery_type',
        'info_de',
        'info_en',
        'info_time',
        'active',
        'watermark',
        'menu_position',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'active' => 'boolean',
        'type' => ProjectType::class,
        'gallery_type' => GalleryType::class
    ];

    protected $appends = ['has_active_photos'];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
    public function hasActivePhotos(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->photos->where('active', true)->count() > 0
        )->shouldCache();
    }
    public function topPhoto()
    {
        $photo = $this->photos->where('active', true)->where('show_on_main', true)->first();
        if ($photo == null) {
            $photo = $this->photos->where('active', true)->first();
        };
        return $photo;
    }
}
