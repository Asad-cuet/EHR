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
        'login_id',
        'password',
        'is_consulted',
        'is_cleared'
    ];
    // public function consultation()  //making relationship
    //             {
    //                  return $this->belongsTo(consultation::class,'patient_id','id');
    //             }
}
