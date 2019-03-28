<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    function aspirantes(){
        return view('principal.aspirantes');
    }
}
