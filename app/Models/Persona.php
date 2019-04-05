<?php

namespace App\Models;

use App\Models\Alumno;
use App\Models\Empleado;
use App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['nom', 'apeP', 'apeM', 'fecha_nac', 'curp'];

    public function alumno(){
        return $this->hasOne(Alumno::class);
    }

    public function empleado(){
        return $this->hasOne(Empleado::class);
    }

    public function usuario(){
        return $this->hasOne(Usuario::class, 'id');
    }
}
