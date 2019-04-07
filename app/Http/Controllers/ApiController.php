<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Empleado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    function login(Request $r){
        $num = $r->get('num');
        $pass = $r->get('pass');

        $user = Alumno::find($num);

        if($user != null)
            if(Hash::check($pass, $user->persona->usuario->pass))
                return json_encode(
                    ["api_token" => $user->persona->usuario->api_token]
                );

        $user = Empleado::find($num);

        if($user != null)
            if(Hash::check($pass, $user->persona->usuario->pass))
                return json_encode(
                    ["api_token" => $user->persona->usuario->api_token]
                );

        return json_encode(["api_token" => "false"]);
    }
}
