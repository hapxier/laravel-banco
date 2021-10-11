<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $table = 'operaciones';

    protected $fillable = [
        'operacion'
    ];

    public $timestamps = false;

    public function transacciones()
    {
        return $this->hasMany('App\Transaccion');
    }
}
