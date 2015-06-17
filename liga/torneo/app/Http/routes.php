<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/fixture', 'WelcomeController@fixture');
Route::get('/fixturetorneo/{id}', 'WelcomeController@fixturetorneo');
Route::get('/estadisticas', 'WelcomeController@estadisticas');
Route::get('/estadisticastorneo/{id}', 'WelcomeController@estadisticastorneo');
Route::get('/instalaciones', 'WelcomeController@instalaciones');

Route::get('admin/home', 'Admin\HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix'=>'admin','namespace'=>'Admin'],
    function(){
        Route::resource('arbitros','ArbitrosController');
        Route::post('arbitros/buscar','ArbitrosController@buscar');
        Route::post('arbitros/mail','ArbitrosController@mail');

        Route::resource('torneos','TorneosController');
        Route::post('torneos/buscar','TorneosController@buscar');
        Route::post('torneos/storeequipo','TorneosController@storeequipo');
        Route::post('torneos/destroyequipo','TorneosController@destroyequipo');
        Route::post('torneos/baja','TorneosController@baja');
        Route::post('torneos/alta','TorneosController@alta');

        Route::resource('equipos','EquiposController');
        Route::post('equipos/buscar','EquiposController@buscar');
        Route::get('equipoimagen/{id}','EquiposController@equipoimagen');
        Route::post('equipoimagen/equipofotoborrar','EquiposController@equipofotoborrar');
        Route::post('equipoimagen/equipofotoguardar','EquiposController@equipofotoguardar');
        Route::post('equipoimagen/equipoescudoborrar','EquiposController@equipoescudoborrar');
        Route::post('equipoimagen/equipoescudoguardar','EquiposController@equipoescudoguardar');

        Route::resource('jugadores','JugadoresController');
        Route::post('jugadores/buscar','JugadoresController@buscar');

        Route::resource('fechas','FechasController');
        Route::post('fechas/buscar','FechasController@buscar');
        Route::get('fecha/{id}','FechasController@imagen');
        Route::post('fecha/imagenguardar','FechasController@imagenguardar');
        Route::post('fecha/imagenborrar','FechasController@imagenborrar');
        Route::post('fecha/imagenequipoguardar','FechasController@imagenequipoguardar');
        Route::post('fecha/imagenequipoborrar','FechasController@imagenequipoborrar');
        Route::post('fecha/imagenfiguraguardar','FechasController@imagenfiguraguardar');
        Route::post('fecha/imagenfiguraborrar','FechasController@imagenfiguraborrar');

        Route::resource('partidos','PartidosController');
        Route::post('partidos/buscar','PartidosController@buscar');
        Route::post('partidos/resultado','PartidosController@resultado');
        Route::post('partidos/goles','PartidosController@goles');
        Route::get('partidos/{idpartido}/{idjugador}','PartidosController@goleseliminar');

        Route::resource('noticias','NoticiasController');
        Route::post('noticias/buscar','NoticiasController@buscar');

        Route::resource('imagenes','ImagenesController');
        Route::post('imagenes/buscar','ImagenesController@buscar');

        //Route::get('imagenes/{id}','ImagenesController@imagenshow');
        Route::post('imagenes/imagenborrar','ImagenesController@imagenborrar');
        Route::post('imagenes/imagenguardar','ImagenesController@imagenguardar');

         Route::get('noticiaimagen/{id}','NoticiasController@noticiaimagen');
        Route::post('noticiaimagen/noticiaimagenborrar','NoticiasController@noticiaimagenborrar');
        Route::post('noticiaimagen/noticiaimagenguardar','NoticiasController@noticiaimagenguardar');

        

});




