<?php

namespace App\Http\Controllers;
use App\Subcategorias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Subcategoria extends Controller
{
    
    public static function getSubcategorias($idCategoria){

        $response = [];

        array_push($response, ["data" => Subcategorias::getSubcategorias($idCategoria)]);
        array_push($response, ["code" => "Success"]);
        array_push($response, ["status" => 200]);
        
        return $response;
    }

    public static function postSubcategoria(Request $request, $idCategoria){
        $subcategoria = new Subcategorias();

        $subcategoria->nombre = $request->input('nombre');
        $subcategoria->idCategoria = $idCategoria;

        $subcategoria->save();

        return response('Success', 200)->json($subcategoria);
    }

}
