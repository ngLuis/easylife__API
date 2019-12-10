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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categoria', 'Categoria@getCategorias');

Route::post('/categoria', 'Categoria@postCategoria');

Route::get('/categoria/{idCategoria}/servicio', 'Categoria@getServicios');

Route::get('/categoria/{idCategoria}', 'Categoria@getCategoria');

Route::get('/carrusel', 'ImagenCarrusel@getImagenes');

Route::post('/carrusel', 'ImagenCarrusel@postImagen');