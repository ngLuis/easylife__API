<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    /*
        Tabla automática con Pluralize. Equivale a:
        protected $table = "categorias";
    */

    // Equivalente a: los que no están aquí, son $fillable
    protected $guarded = [];

    /**
     * Relación 1-N con servicios
     */
    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
