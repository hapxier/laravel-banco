<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transacciones';

    protected $fillable = [
        'id_tarjeta', 'id_operacion', 'fecha_transaccion', 'num_cuenta_destino', 'monto'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function tarjeta()
    {
        return $this->belongsTo('App\Tarjeta');
    }

    public function operacion()
    {
        return $this->belongsTo('App\Operacion');
    }
}
