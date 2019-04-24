<?php

// LOGIN ------------------------------------------

Route::get('/plataforma', function(){
    return redirect('/plataforma/login');
});

Route::get('/plataforma/login', function(){
    return view('plataforma.login.login');
});

Route::get('/plataforma/identificacion', function(){
    return view('plataforma.login.identify');
});

Route::post('/login', 'InicioController@login');

Route::post('/sms', 'InicioController@recuperacion');

Route::post('/checkCode', 'InicioController@checkCode');

Route::post('/changePassword', 'InicioController@changePassword');

// /LOGIN ------------------------------------------
