<?php

namespace App\Models;

use App\Models\Persona;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $primaryKey = 'matricula';
    public $timestamps = false;

    public function persona(){
        return $this->belongsTo(Persona::class);
    }
}
