<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'file_name',
        'total_pages',
        'pdf_pages',
        'status',
        'work_file',
    ];
}
