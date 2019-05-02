<?php

Route::get('/plataforma/maestro/calificaciones', 'Plataforma\MaestroController@califsView');

Route::post('/plataforma/maestro/calificaciones/unidades', 'Plataforma\MaestroController@califsView2');

Route::post('/getMaterias', 'Plataforma\MaestroController@getMaterias');

Route::post('/getTable', 'Plataforma\MaestroController@getTable');

Route::post('/upCalif', 'Plataforma\MaestroController@upCalif');
