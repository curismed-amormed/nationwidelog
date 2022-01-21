<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denial extends Model
{
    use HasFactory;

    protected $fillable = [
        'denial_reasons',
        'status',
       
    ];
}
