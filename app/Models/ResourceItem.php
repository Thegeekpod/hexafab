<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceItem extends Model
{
    protected $fillable = [
        'title',
        'tag',
        'description',
        'image_path',
        'link_text',
    ];
}
