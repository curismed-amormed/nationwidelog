<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
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
        'doc',
        'check_date',
        'check_amount',
        'check_no',
        'insurance_id',
        'provider_id',
    ];
}
