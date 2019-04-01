<?php

namespace App\Models;

use App\Models\Persona;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $timestamps = false;

    public function persona(){
        return $this->belongsTo(Persona::class, 'id');
    }
}
