<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = 'tarjetas';

    protected $fillable = [
        'id_cliente', 'num_tarjeta', 'id_tipo', 'num_cuenta', 'fecha_afiliacion', 'fecha_caducidad', 'saldo'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function tipo_cuenta()
    {
        return $this->belongsTo('App\TipoCuenta');
    }

    public function transacciones()
    {
        return $this->hasMany('App\Transaccion');
    }
}
