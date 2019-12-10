<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    
    protected $table = 'subcategorias';
    protected $fillable = ['nombre','idCategoria'];
    public $timestamps = false;

    public static function getSubcategorias($idCategoria){
        return \DB::table('subcategorias')->where('idCategoria', $idCategoria)->get();
    }

}
