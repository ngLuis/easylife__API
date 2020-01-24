<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'servicio_user';
    protected $fillable = ['servicio_id', 'user_id', 'tipo'];

    public $timestamps = true;
}