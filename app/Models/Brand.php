<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'name',
        'logo',
        'description',
        'facebook_link',
        'x_link',
        'linkedin_link',
        'instagram_link',
        'youtube_link',
        'tiktok_link',
    ];
}