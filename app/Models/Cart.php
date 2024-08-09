<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'brand',
        'package_name',
        'package_price',
        'duration',
        'total_price',
    ];
}