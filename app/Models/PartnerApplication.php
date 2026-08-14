<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerApplication extends Model
{
    protected $fillable = [
        'name',
        'company_name',
        'phone',
        'email',
        'address',
        'status',
        'notes',
    ];
}
