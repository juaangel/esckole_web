<?php

namespace App\Models;

use App\Models\Alumno;
use App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function alumno(){
        return $this->hasOne(Alumno::class);
    }

    public function usuario(){
        return $this->hasOne(Usuario::class, 'id');
    }
}
