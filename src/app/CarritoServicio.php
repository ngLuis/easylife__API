<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarritoServicio extends Model
{

    protected $table = 'carrito_servicio';
    public $timestamps = true;

    // Equivalente a: los que no están aquí, son $fillable
    protected $guarded = [];

}
