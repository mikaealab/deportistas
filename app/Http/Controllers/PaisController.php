<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pais;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paises = Pais::all();
        return view('paises.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('paises.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $pais = [
            'pais' => $request->pais
        ];
        Pais::create($pais);
        return redirect()->route('paises.index');
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
        $pais = Pais::find($id);
        return view('paises.editar', compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pais = Pais::find($id);
        $pais->pais = $request->pais;
        $pais->save();
        return redirect()->route('paises.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pais = Pais::findOrFail($id);

        // Verificar si tiene deportistas relacionados
        if ($pais->deportistas()->count() > 0) {
            return redirect()->route('paises.index')
                ->with('error', 'No se puede eliminar este país porque tiene deportistas asociados.');
        }

        // Si no tiene relaciones, se elimina
        $pais->delete();

        return redirect()->route('paises.index')
            ->with('success', 'País eliminado correctamente.');
    }

}
