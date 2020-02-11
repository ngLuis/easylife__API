<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPanel extends Model
{
    protected $table ='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'acreditation', 'password', 'address', 'dni', 'id', 'image', 'name', 'mobilephone', 'email', 'type'
    ];

    public $timestamps= true;
}
