<?php

Route::post('/login', 'InicioController@login');

Route::get('/plataforma', function(){
    return view('plataforma.login.login');
});

Route::get('/plataforma/identificacion', function(){
    return view('plataforma.login.identify');
});
