<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        return response()->json(Vehiculo::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_vehiculo' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'descripcion' => 'nullable|string', 
            'fecha_creacion' => 'required|date',
            'fecha_caducidad' => 'required|date|after_or_equal:fecha_creacion',
        ]);

        $vehiculo = Vehiculo::create($request->all());
        return response()->json($vehiculo, 201);
    }

    public function show($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return response()->json($vehiculo);
    }

    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $request->validate([
            'tipo_vehiculo' => 'string|max:255',
            'categoria' => 'string|max:255',
            'descripcion' => 'nullable|string', 
            'fecha_creacion' => 'date',
            'fecha_caducidad' => 'date|after_or_equal:fecha_creacion',
        ]);

        $vehiculo->update($request->all());
        return response()->json($vehiculo);
    }

    public function destroy($id)
    {
        Vehiculo::findOrFail($id)->delete();
        return response()->json(['message' => 'Vehiculo eliminado correctamente']);
    }
}
