<?php

namespace App\Models;

use App\Enums\ProjectType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
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
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
    public function mainPhoto()
    {
        return $this->photos()->where('active', true);
    }
}
