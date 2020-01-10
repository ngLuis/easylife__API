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

Route::resource('/categoria', 'CategoriasController');

Route::get('/categoria/{idCategoria}/servicio', 'CategoriasController@getServicios');

//La parte de abajo la está haciendo Iván
Route::get('/carrusel', 'ImagenCarrusel@getImagenes');

Route::post('/carrusel', 'ImagenCarrusel@postImagen');



Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

