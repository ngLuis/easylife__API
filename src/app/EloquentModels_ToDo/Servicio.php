<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    /*
        Tabla automática con Pluralize. Equivale a:
        protected $table = "servicios";
    */

    // Equivalente a: los que no están aquí, son $fillable
    protected $guarded = [];

    /**
     * Relación 1-N con categoria
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Relación n-n con colaboradores
     */
    public function colaboradores()
    {
        return $this->belongsToMany(Colaborador::class);
    }
}