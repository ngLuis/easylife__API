<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImagesController extends Controller
{

    public function saveImage($location, $type, $inputName, $request){
        $time = time();
        $extension = '.'.explode('.', $request->file($inputName)->getClientOriginalName())[1];
        $request->file($inputName)->storeAs($location, $type.'-'.$time.$extension);

        return $type.'-'.$time.$extension;
    }
    
}
