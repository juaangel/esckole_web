<?php

namespace App\Models;

use App\Models\Alumno;
use App\Models\Materia_unidad;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    protected $table = 'calificaciones';

    public function alumno(){
        return $this->belongsTo(Alumno::class, 'matricula_alumno', 'matricula');
    }

    /*public function materia_unidad(){
        return $this->
    }*/
}
