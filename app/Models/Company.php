<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'country',
        'mobile_number',
        'zip_code',
    ];
}