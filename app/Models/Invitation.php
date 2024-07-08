<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $primaryKey = 'email';
     public $incrementing = false;
     protected $keyType = 'string';
     
     protected $fillable = [
        'email',
        'employee_id',
        'affiliation',
        'role',
    ];
}