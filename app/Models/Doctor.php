<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table='doctors';
    protected $fillable=['name','subject','gender','phone','login_id','password'];

    public function consultation()  //making relationship
    {
         return $this->belongsTo(Doctor::class,'consulted_by','id');
    }
}
