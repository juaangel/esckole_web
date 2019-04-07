<?php

namespace App\Models;

use App\Models\Grupo;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public $timestamps = false;

    public function grupos(){
        return $this->hasMany(Grupo::class);
    }
}
