<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ImagenesCarrusel;

class ImagenCarrusel extends Controller
{

    public static function getImagenes(){

        $response = [];

        array_push($response, ["data" => ImagenesCarrusel::all()]);
        array_push($response, ["code" => "Success"]);
        array_push($response, ["status" => 200]);


        return $response;
    }

    public static function postImagen(Request $request){
        $imagen = new ImagenesCarrusel();

        $imagen->imagen = $request->input('imagen');
        $imagen->titulo = $request->input('titulo');
        $imagen->descripcion = $request->input('descripcion');

        $imagen->save();

        return response()->json($imagen);
    }

}
