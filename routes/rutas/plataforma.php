<?php

Route::post('/login', 'InicioController@login');

Route::get('/plataforma', function(){
    return view('plataforma.login');
});
