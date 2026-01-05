<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'published_at',
        'thumbnail',
        'cover_image',
        'content',
        'tags',
        'status',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];


}

