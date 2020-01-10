<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagencarousel extends Model
{
    // Cambiamos nombre de la tabla por defecto (no sigue el plural automático)
    protected $table = 'imagenescarousel';

    // Equivalente a: los que no están aquí son $fillable
    protected $guarded = [];

    //getImagenes() sería simplemente Imagencarousel()->get() //TODO comprobar

}