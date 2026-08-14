<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'tag',
        'description',
        'content',
        'image_path',
        'link_text',
        'author',
        'reading_time',
        'is_featured',
    ];
}
