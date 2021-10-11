<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTarjetaRequest;
use App\Http\Requests\UpdateTarjetaRequest;
use App\Tarjeta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TarjetaController extends Controller
{
    public function index()
    {
        // return Tarjeta::all();

        $tarjetas = Tarjeta::join('clientes','tarjetas.id_cliente','=','clientes.id')
        ->join('tipo_cuentas','tarjetas.id_tipo','=','tipo_cuentas.id')
        ->select('tarjetas.id','tarjetas.id_cliente','tarjetas.id_tipo','tarjetas.num_tarjeta','tarjetas.num_cuenta',
        'tarjetas.fecha_afiliacion','tarjetas.fecha_caducidad','tarjetas.saldo','clientes.nombre','clientes.apellido','tipo_cuentas.tipo')
        ->orderBy('tarjetas.id', 'asc')
        ->get();
        
        return $tarjetas;
    }

    
    public function store(CreateTarjetaRequest $request)
    {
        $input = $request->all();
        $input['fecha_afiliacion'] = Carbon::now('America/Tegucigalpa')->toDateTimeString();

        Tarjeta::create($input);


        return response()->json([
            'res'=>true,
            'message'=>'Registro creado!'
        ],200);
    }

    
    public function show($id)
    {
        // return Tarjeta::findOrfail($id);

        $tarjetas = Tarjeta::join('clientes','tarjetas.id_cliente','=','clientes.id')
        ->join('tipo_cuentas','tarjetas.id_tipo','=','tipo_cuentas.id')
        ->select('tarjetas.id','tarjetas.id_cliente','tarjetas.id_tipo','tarjetas.num_tarjeta','tarjetas.num_cuenta',
        'tarjetas.fecha_afiliacion','tarjetas.fecha_caducidad','tarjetas.saldo','clientes.nombre','clientes.apellido','tipo_cuentas.tipo')
        ->where('tarjetas.id','=',$id)
        ->orderBy('tarjetas.id', 'asc')
        ->get();
        
        return $tarjetas;
    }

    
    public function update(UpdateTarjetaRequest $request, $id)
    {
        $input = $request->all();
        $tarjeta = Tarjeta::findOrfail($id);
        $tarjeta->update($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro actualizado!'
        ],200);
    }

    
    public function destroy($id)
    {
        Tarjeta::destroy($id);

        return response()->json([
            'res'=>true,
            'message'=>'Registro eliminado!'
        ],200);
    }
}
