<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Deportista;

class DeportistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $deportistas = Deportista::all();
        return view('deportista.index', compact('deportistas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('deportista.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $deportista = [
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'estatura_cm' => $request->estatura_cm,
            'peso_kg' => $request->peso_kg,
            'id_pais' => $request->id_pais,
            'id_disciplina' => $request->id_disciplina
        ];
        Deportista::create($deportista);
        return redirect()->route('deportista.index')->with('success', 'El deportista ha sido creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $deportista = Deportista::find($id);
        return view('deportista.editar', compact('deportista'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $deportista = Deportista::find($id);
        $deportista->nombre = $request->nombre;
        $deportista->fecha_nacimiento = $request->fecha_nacimiento;
        $deportista->estatura_cm = $request->estatura_cm;
        $deportista->peso_kg = $request->peso_kg;
        $deportista->id_pais = $request->id_pais;
        $deportista->id_disciplina = $request->id_disciplina;
        $deportista->save();
        return redirect()->route('deportista.index')->with('success', 'El deportista ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deportista = Deportista::find($id);
        $deportista->delete();
        return redirect()->route('deportista.index')->with('success', 'El deportista ha sido eliminado');
    }
}
