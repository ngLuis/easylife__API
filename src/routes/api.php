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

Route::get('/categorias', 'Categoria@getCategorias');

Route::post('/categorias', 'Categoria@postCategoria');

Route::get('/{idCategoria}/subcategorias', 'Subcategoria@getSubcategorias');

Route::post('/{idCategoria}/subcategorias', 'Subcategoria@postSubcategoria');

Route::get('/imagenesCarrusel', 'ImagenCarrusel@getImagenes');

Route::post('/imagenesCarrusel', 'ImagenCarrusel@postImagen');