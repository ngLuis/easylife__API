<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';
    public $timestamps = true;

    // Equivalente a: los que no están aquí, son $fillable
    protected $guarded = [];
}
