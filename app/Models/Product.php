<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'badge',
        'image_path',
        'hero_image',
        'hero_title',
        'hero_subtitle',
        'hero_desc',
        'pdf_path',
        'pdf_button_text',
        'specifications',
        'spec_bar',
        'app_heading',
        'app_commercial_title',
        'app_commercial_desc',
        'app_commercial_image',
        'app_industrial_title',
        'app_industrial_desc',
        'app_industrial_image',
        'details',
    ];

    protected $casts = [
        'specifications' => 'array',
        'spec_bar' => 'array',
        'details' => 'array',
    ];
}
