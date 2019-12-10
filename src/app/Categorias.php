<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    
    protected $table = 'categorias';
    protected $fillable = ['nombre','descripcion','imagen'];
    public $primaryKey = 'id';
    public $timestamps = false;

    public function getCategoria($idCategoria) {
        return \DB::table($this->table)->where('id', $idCategoria)->get();
    }
    
}
