<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table='patients';
    protected $fillable=[
        'name',
        'gender',
        'age',
        'weight',
        'address',
        'phone',
        'guardian_name',
        'guardian_phone',
        'relationship',
        'quantity_of_consultation'
    ];
    public function consultation()  //making relationship
                {
                     return $this->belongsTo(consultation::class,'patient_id','id');
                }
}
