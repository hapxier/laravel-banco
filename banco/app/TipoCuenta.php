<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    protected $table = 'tipo_cuentas';

    protected $fillable = [
        'tipo'
    ];

    public $timestamps = false;

    public function tarjetas()
    {
        return $this->hasMany('App\Tarjeta');
    }
}
