<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'resource',
        'visited_at',
        'project_id',
        'page_hits'
    ];

    protected $casts = [
        'visited_at' => 'date:Y-m-d',
    ];
}
