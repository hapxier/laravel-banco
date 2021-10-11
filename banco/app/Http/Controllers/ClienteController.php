<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\CreateClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    public function index()
    {
        return Cliente::all();
    }

    
    public function store(CreateClienteRequest $request)
    {
        $input = $request->all();
        Cliente::create($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro creado!'
        ],200);
    }

    
    public function show($id)
    {
        return Cliente::findOrfail($id);
    }

    
    public function update(UpdateClienteRequest $request, $id)
    {
        $input = $request->all();
        $cliente = Cliente::findOrfail($id);
        $cliente->update($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro actualizado!'
        ],200);
    }

    
    public function destroy($id)
    {
        Cliente::destroy($id);

        return response()->json([
            'res'=>true,
            'message'=>'Registro eliminado!'
        ],200);
    }
}
