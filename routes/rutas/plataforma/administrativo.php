<?php

//RUTAS EXCLUSIVAS DE INTERFAZ ADMINISTRATIVO
Route::get('/plataforma/añadir_persona', 'Plataforma\AdministrativoController@Rpersonal');
Route::post('/plataforma/añadir_persona', 'Plataforma\AdministrativoController@regPer');
Route::get('/plataforma/añadir_alumno', 'Plataforma\AdministrativoController@inscripcionesView');
Route::get('/plataforma/altaAlumno/{id}', 'Plataforma\AdministrativoController@altaAlumno');