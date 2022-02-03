<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;
    protected $fillable = [
        'insurance_name',
        'status',
        
    ];

    
    public function remittance()
{
    return $this->hasMany(Remittance::class); 
}
}
