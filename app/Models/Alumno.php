<?php

namespace App\Models;

use App\Models\Calificaciones;
use App\Models\Grupo;
use App\Models\Persona;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $primaryKey = 'matricula';
    public $timestamps = false;

    public function calificaciones(){
        return $this->hasMany(Calificaciones::class, 'matricula_alumno', 'matricula');
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }

    public function persona(){
        return $this->belongsTo(Persona::class);
    }
}
