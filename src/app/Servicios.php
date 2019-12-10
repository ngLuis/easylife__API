<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    
    protected $table = 'servicios';
    protected $fillable = ['nombre','idCategoria','precio','imagen','descripcion'];
    public $timestamps = false;

    public function getServiciosPorCategoria($idCategoria){
        return \DB::table('servicios')->where('idCategoria',$idCategoria)->get();
    }
}
