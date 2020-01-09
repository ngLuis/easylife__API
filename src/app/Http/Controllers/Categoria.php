<?php

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Categorias;
// use App\Servicios;

// class Categoria extends Controller
// {

//     public static function getCategoria($idCategoria) {

//         $categoria = new Categorias();

//         $data = $categoria->getCategoria($idCategoria);
//         $status = 404;
//         $code = 'Category Not Found';

//         if ( count($data) !== 0 ) {
//             $status = 200;
//             $code = 'Success';
//         }

//         return response()->json([
//             "data" => $data,
//             "code" => $code,
//             "status" => $status
//         ]);
//     }

//     public static function getCategorias(){

//         $data = Categorias::all();
//         $status = 404;
//         $code = 'Categories Not Found';

//         if ( count($data) !== 0 ) {
//             $status = 200;
//             $code = 'Success';
//         }

//         return response()->json([
//             "data" => $data,
//             "code" => $code,
//             "status" => $status
//         ]);
//     }

//     public function getServicios($idServicio){
//         $servicio = new Servicios();

//         $data = $servicio->getServiciosPorCategoria($idServicio);
//         $status = 404;
//         $code = 'Services Not Found';

//         if ( count($data) !== 0 ) {
//             $status = 200;
//             $code = 'Success';
//         }

//         return response()->json([
//             "data" => $data,
//             "code" => $code,
//             "status" => $status
//         ]);
//     }

//     public static function postCategoria(Request $request){
//         $categoria = new Categorias();

//         $categoria->nombre = $request->input('nombre');
//         $categoria->descripcion = $request->input('descripcion');
//         $categoria->imagen = $request->input('imagen');

//         $categoria->save();

//         return response()->json($categoria);
//     }
// }
