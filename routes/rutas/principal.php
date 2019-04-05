<?php

Route::get('/', function () {
    return view('principal.inicio');
});

Route::get('/aspirantes', 'InicioController@aspirantes');

Route::get('/cursos', function(){
    return view('principal.cursos');
});

Route::get('/contacto', function(){
    return view('principal.contacto');
});
Route::get('/login', function(){
    return view('plataforma.login');
});
