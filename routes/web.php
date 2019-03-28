<?php

Route::get('/', function () {
    return view('principal.inicio');
});

Route::get('/aspirantes', 'InicioController@aspirantes');
