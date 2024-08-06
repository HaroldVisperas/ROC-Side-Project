<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'brand',
        'color_hex',
        'color_rgb',
        'color_hsl',
    ];
}