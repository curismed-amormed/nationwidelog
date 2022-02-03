<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
        
    }

    public function insurance()
    {
        return $this->belongsTo(Insurance::class,'insurance_id' );
    }

    protected $fillable = [
        'medicaldoc',
        'location',
        'dos',
        'patient',
        'medical_status',
        'file_type',
        'insurance_id',
        'provider_id',
        'denial_date',
        'encounter',
        'medical_reason',
       
    ];
}
