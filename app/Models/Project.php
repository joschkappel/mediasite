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
        'info_date',
        'active',
        'watermark',
        'sort_order_no',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'active' => 'boolean',
        'type' => ProjectType::class,
    ];
}
