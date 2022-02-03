<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Patient extends Model
{

    use HasFactory;
    
       protected $fillable = [
        'account_no',
        'first_name',
        'last_name',
        'dob'
       
    ];
}
