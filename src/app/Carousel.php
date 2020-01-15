<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{

    protected $table = 'imagenescarousel';
    protected $fillable = ['imagen','titulo','descripcion'];
    public $timestamps = false;

}
