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

Route::resource('/categoria', 'CategoriaController');

Route::get('/categoria/{idCategoria}/servicio', 'CategoriaController@getServicios');


Route::resource('/carousel', 'ImagencarouselController');

Route::resource('/servicio', 'ServicioController');

Route::post('/servicio/{idServicio}', 'ServicioController@patchService');

Route::post('/categoria/{idCategoria}', 'CategoriaController@patchCategoria');

Route::resource('/compra', 'CompraController');

Route::resource('/carrito', 'CarritoController');

Route::get('/user/{idUser}/carrito/estado/{estado}', 'CarritoController@getCarritoByUser');

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
});
