<?php

Route::get('/plataforma', 'Plataforma\PlataformaController@platformAccess');

Route::get('/cerrarSesion', 'Plataforma\PlataformaController@cerrarSesion');

// <LOGIN> ------------------------------------------

Route::get('/plataforma/login', function(){
    return view('plataforma.login.login');
});

Route::get('/plataforma/identificacion', function(){
    return view('plataforma.login.identify');
});

Route::post('/login', 'Plataforma\PlataformaController@login');

Route::post('/sms', 'Plataforma\PlataformaController@recuperacion');

Route::post('/checkCode', 'Plataforma\PlataformaController@checkCode');

Route::post('/changePassword', 'Plataforma\PlataformaController@changePassword');

// </LOGIN> ------------------------------------------

Route::get('/plataforma/info_persona', 'Plataforma\PlataformaController@personInfo');

Route::post('/changePassword2', 'Plataforma\PlataformaController@changePassword2');
