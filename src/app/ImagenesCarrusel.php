<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesCarrusel extends Model
{

    protected $table = 'imagenescarrousel';
    protected $fillable = ['imagen','titulo','descripcion'];
    public $timestamps = false;
    
    public static function getImagenes(){
        return \DB::table('ImagenesCarrousel')->get();
    }

}
