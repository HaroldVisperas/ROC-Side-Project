<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'brand',
        'reference_id',
        'package_name',
        'status',
        'payment_method',
        'total_price',
        'duration',
    ];
}