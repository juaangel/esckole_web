<?php

namespace App\Models;

use App\Models\Persona;
use App\Models\Asignacion_materias;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public $timestamps = false;

    public function alumnos(){
        return $this->belongsToMany(Alumno::class);
    }

    public function asignacion_materias(){
        return $this->hasMany(Asignacion_materias::class);
    }
}
