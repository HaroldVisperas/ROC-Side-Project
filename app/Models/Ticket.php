<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'brand',
        'employee_id',
        'first_name',
        'middle_name',
        'last_name',
        'work_email',
        'title',
        'message',
        'status',
        '_token',  // Ensure this line is present
    ];
}