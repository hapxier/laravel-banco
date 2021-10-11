<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransaccionRequest;
use App\Http\Requests\UpdateTransaccionRequest;
use App\Transaccion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    
    public function index()
    {
        // return Transaccion::all();

        $transacciones = Transaccion::join('tarjetas','transacciones.id_tarjeta','=','tarjetas.id')
        ->join('operaciones','transacciones.id_operacion','=','operaciones.id')
        ->join('clientes','tarjetas.id_cliente','=','clientes.id')
        ->join('tipo_cuentas','tarjetas.id_tipo','=','tipo_cuentas.id')
        ->select('transacciones.id','transacciones.id_tarjeta','transacciones.id_operacion','transacciones.fecha_transaccion',
        'transacciones.num_cuenta_destino', 'operaciones.operacion','transacciones.monto','clientes.nombre','clientes.apellido','tarjetas.num_tarjeta','tarjetas.num_cuenta')
        ->orderBy('transacciones.id', 'asc')
        ->get();

        return $transacciones;
    }

    
    public function store(CreateTransaccionRequest $request)
    {
        $input = $request->all();
        $input['fecha_transaccion'] = Carbon::now('America/Tegucigalpa')->toDateTimeString();
        Transaccion::create($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro creado!'
        ],200);
    }

    public function show($id)
    {
        $transaccion = Transaccion::join('tarjetas','transacciones.id_tarjeta','=','tarjetas.id')
        ->join('operaciones','transacciones.id_operacion','=','operaciones.id')
        ->join('clientes','tarjetas.id_cliente','=','clientes.id')
        ->join('tipo_cuentas','tarjetas.id_tipo','=','tipo_cuentas.id')
        ->select('transacciones.id','transacciones.id_tarjeta','transacciones.id_operacion','transacciones.fecha_transaccion',
        'transacciones.num_cuenta_destino', 'operaciones.operacion','transacciones.monto','clientes.nombre','clientes.apellido','tarjetas.num_tarjeta','tarjetas.num_cuenta')
        ->where('transacciones.id', '=', $id)
        ->orderBy('transacciones.id', 'asc')
        ->get();

        return $transaccion;
    }

    public function update(UpdateTransaccionRequest $request, $id)
    {
        $input = $request->all();
        $transaccion = Transaccion::findOrfail($id);
        $transaccion->update($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro actualizado!'
        ],200);
    }

    public function destroy($id)
    {
        Transaccion::destroy($id);

        return response()->json([
            'res'=>true,
            'message'=>'Registro eliminado!'
        ],200);
    }
}
