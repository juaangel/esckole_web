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

# Peticiones

Route::post('/ficha-online', 'InicioController@fichaOnline');
