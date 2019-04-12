<?php

namespace App\Models;

use App\Models\Asignacion_materias;
use App\Models\Calificaciones;
use App\Models\Grupo;
use App\Models\Materia_unidad;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    public $timestamps = false;

    public function asignacion_materias(){
        return $this->hasMany(Asignacion_materias::class);
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }

    public function calificaciones(){
        return $this->hasMany(Calificaciones::class);
    }
}
