<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOperacionRequest;
use App\Http\Requests\UpdateOperacionRequest;
use App\Operacion;
use Illuminate\Http\Request;

class OperacionController extends Controller
{
    public function index()
    {
        return Operacion::all();
    }

    public function store(CreateOperacionRequest $request)
    {
        $input = $request->all();
        Operacion::create($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro creado!'
        ],200);
    }
    
    public function show($id)
    {
        return Operacion::findOrfail($id);
    }

    
    public function update(UpdateOperacionRequest $request, $id)
    {
        $input = $request->all();
        $operacion = Operacion::findOrfail($id);
        $operacion->update($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro actualizado!'
        ],200);
    }

    
    public function destroy($id)
    {
        Operacion::destroy($id);

        return response()->json([
            'res'=>true,
            'message'=>'Registro eliminado!'
        ],200);
    }
}
