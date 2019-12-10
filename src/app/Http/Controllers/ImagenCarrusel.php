<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ImagenesCarrusel;

class ImagenCarrusel extends Controller
{

    public static function getImagenes(){

        $data = ImagenesCarrusel::all();
        $status = 404;
        $code = 'Images Not Found';

        if ( count($data) !== 0 ) {
            $status = 200;
            $code = 'Success';
        }

        return response()->json([
            "data" => $data,
            "code" => $code,
            "status" => $status
        ]);
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
