<?php

Route::get('/plataforma', 'Plataforma\PlataformaController@platformAccess');

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

Route::post('/changePassword', 'PlataformaController@changePassword');

// </LOGIN> ------------------------------------------
