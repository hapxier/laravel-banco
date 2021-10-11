<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombre', 'apellido'
    ];

    public $timestamps = false;

    public function tarjetas()
    {
        return $this->hasMany('App\Tarjeta');
    }
}
