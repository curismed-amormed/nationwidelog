<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDetail extends Model
{
    use HasFactory;

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
        
    }

    public function workstatus()
    {
        return $this->belongsTo('App\Models\WorkStatus','workstatus_id');
        
    }
    public function patients()
    {
        return $this->belongsTo(Patient::class);
        
    }

    protected $fillable = [
        'workstatus_id',
        'file_type',
        'select_reason',
        'no_of_pages',
        'provider_id',
        'dos',
        'select_status',
        'range'
    ];
}
