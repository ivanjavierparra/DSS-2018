<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*     APIS DE NOTICIAS   */
//crud
Route::get('api/noticias', 'NoticiaController@index');
Route::post('api/noticias', 'NoticiaController@store');

Route::get('api/noticias/{id?}', 'NoticiaController@show');
Route::put('api/noticias/{id?}', 'NoticiaController@update');
Route::delete('api/noticias/{id?}', 'NoticiaController@destroy');

//filtros sobre seccion
Route::get('api/noticias/seccion/{seccion?}', 'NoticiaController@getNoticiasSeccion');
Route::get('api/noticias/seccion/{seccion?}/topten', 'NoticiaController@getNoticiasSeccionVisitas');

// Filtros sobre noticias
Route::get('api/noticias/{id?}/tags', 'NoticiaController@getNoticiasTags');
Route::get('api/noticias/{id?}/relacionadas', 'NoticiaController@getNoticiasRelacionadas');
Route::get('api/noticias/{id?}/contenido', 'NoticiaController@getNoticiasContenido');
Route::get('api/noticias/topten/historico', 'NoticiaController@getNoticiasTopTen');
Route::get('api/noticias/titulo/{titulo?}', 'NoticiaController@getNoticiasByTitulo');