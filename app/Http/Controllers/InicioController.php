<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Empleado;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    function aspirantes(){
        return view('principal.aspirantes');
    }

    function login(Request $data){
        $num = $data->get('num');
        $pass = $data->get('pass');

        //ALUMNO
        $user = Alumno::find($num);

        if($user != null)
            if(Hash::check($pass, $user->persona->usuario->pass))
                return view('plataforma.alumno.home')->with('nom', $user->persona->nom);

        //EMPLEADO
        $user = Empleado::find($num);

        if($user != null)
            if(Hash::check($pass, $user->persona->usuario->pass)){
                if($user->tipoEmpleado->tipo == 'administrativo')
                    return view('plataforma.administrativo.home')->with('nom', $user->persona->nom);
                if($user->tipoEmpleado->tipo == 'maestro')
                    return view('plataforma.maestro.home')->with('nom', $user->persona->nom);
            }

        return back()->with('mensaje', 'nachos');
    }
}
