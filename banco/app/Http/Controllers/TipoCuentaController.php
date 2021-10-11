<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoCuentaRequest;
use App\Http\Requests\UpdateTipoCuentaRequest;
use App\TipoCuenta;
use Illuminate\Http\Request;

class TipoCuentaController extends Controller
{
    public function index()
    {
        return TipoCuenta::all();
    }

    public function store(CreateTipoCuentaRequest $request)
    {
        $input = $request->all();
        TipoCuenta::create($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro creado!'
        ],200);
    }
    
    public function show($id)
    {
        return TipoCuenta::findOrfail($id);
    }

    
    public function update(UpdateTipoCuentaRequest $request, $id)
    {
        $input = $request->all();
        $tipoCuenta = TipoCuenta::findOrfail($id);
        $tipoCuenta->update($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro actualizado!'
        ],200);
    }

    
    public function destroy($id)
    {
        TipoCuenta::destroy($id);

        return response()->json([
            'res'=>true,
            'message'=>'Registro eliminado!'
        ],200);
    }
}
