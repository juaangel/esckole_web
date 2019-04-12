<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/login', 'ApiController@login');

Route::post('/datosAlumno', 'ApiController@datosAlumno')
    ->middleware('api_token');

Route::post('/calificaciones', 'ApiController@calificaciones')
    ->middleware('api_token');
