<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $disciplinas = Disciplina::all();
        return view('disciplina.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('disciplina.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $disciplina = [
            'disciplina' => $request->disciplina
        ];
        Disciplina::create($disciplina);
        return redirect()->route('disciplina.index')->with('success', 'La disciplina ha sido creada');
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
        $disciplina = Disciplina::find($id);
        return view('disciplina.editar', compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $disciplina = Disciplina::find($id);
        $disciplina->disciplina = $request->disciplina;
        $disciplina->save();
        return redirect()->route('disciplina.index')->with('success', 'La disciplina ha sido actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $disciplina = Disciplina::find($id);
        $disciplina->delete();
        return redirect()->route('disciplina.index')->with('success', 'La disciplina ha sido eliminada');
    }
}
