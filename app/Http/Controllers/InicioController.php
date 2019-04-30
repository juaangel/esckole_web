<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    function aspirantes(){
        return view('principal.aspirantes');
    }

    function fichaOnline(Request $R){
        //528711003778
        return dd($R->all());
    }
}
