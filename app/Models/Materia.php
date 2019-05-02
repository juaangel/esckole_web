<?php

namespace App\Models;

use App\Models\Asignacion_materias;
use App\Models\Calificaciones;
use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\Materia_unidad;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    public $timestamps = false;

    public function asignacion_materias(){
        return $this->hasMany(Asignacion_materias::class);
    }

    public function calificaciones(){
        return $this->hasMany(Calificaciones::class);
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }

    public function maestros(){
        return $this->belongsToMany(Empleado::class, 'asignacion_materias', 'materia_id', 'maestro_id');
    }
}
