<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorias;

class Categoria extends Controller
{
    public static function getCategorias(){
        $response = [];

        array_push($response, ["data" => Categorias::all()]);
        array_push($response, ["code" => "Success"]);
        array_push($response, ["status" => 200]);

        return response()->json($response);
    }

    public static function postCategoria(Request $request){
        $categoria = new Categorias();

        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->imagen = $request->input('imagen');

        $categoria->save();

        return response()->json($categoria);
    }
}
