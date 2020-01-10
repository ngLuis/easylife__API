<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    // Cambiamos nombre de la tabla por defecto (no sigue el plural automático)
    protected $table = 'colaboradores';

    // Equivalente a: los que no están aquí, son $fillable
    protected $guarded = [];

    /**
     * Relación n-n con servicio
     */
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class);
    }
}