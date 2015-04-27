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

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix'=>'admin','namespace'=>'Admin'],
    function(){
        Route::resource('arbitros','ArbitrosController');
    });

Route::post('admin/arbitros/buscar','Admin\ArbitrosController@buscar');

Route::group(['prefix'=>'admin','namespace'=>'Admin'],
    function(){
        Route::resource('torneos','TorneosController');
    });
Route::post('admin/torneos/buscar','Admin\TorneosController@buscar');

Route::get('admin/torneos/equipos','Admin\TorneosController@equipos');

Route::post('admin/torneos/storeequipo','Admin\TorneosController@storeequipo');

Route::post('admin/torneos/destroyequipo','Admin\TorneosController@destroyequipo');
Route::post('admin/torneos/baja','Admin\TorneosController@baja');
Route::post('admin/torneos/alta','Admin\TorneosController@alta');

Route::group(['prefix'=>'admin','namespace'=>'Admin'],
    function(){
        Route::resource('equipos','EquiposController');
    });
Route::post('admin/equipos/buscar','Admin\EquiposController@buscar');

Route::group(['prefix'=>'admin','namespace'=>'Admin'],
    function(){
        Route::resource('jugadores','JugadoresController');
    });
Route::post('admin/jugadores/buscar','Admin\JugadoresController@buscar');

Route::group(['prefix'=>'admin','namespace'=>'Admin'],
    function(){
        Route::resource('fechas','FechasController');
    });
Route::post('admin/fechas/buscar','Admin\FechasController@buscar');


Route::group(['prefix'=>'admin','namespace'=>'Admin'],
    function(){
        Route::resource('partidos','PartidosController');
    });