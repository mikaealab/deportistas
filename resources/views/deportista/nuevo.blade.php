@extends('layout.app')

@section('Contenido')
<div class="container">
    <h2>Nuevo Deportista</h2>

    <form action="{{ route('deportista.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Estatura (cm)</label>
            <input type="number" name="estatura_cm" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Peso (kg)</label>
            <input type="number" name="peso_kg" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pais</label>
            <select name="id_pais" class="form-select" required>
                <option value="">Seleccione</option>
                @foreach($paises as $p)
                    <option value="{{ $p->id_pais }}">{{ $p->pais }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Disciplina</label>
            <select name="id_disciplina" class="form-select" required>
                <option value="">Seleccione</option>
                @foreach($disciplinas as $d)
                    <option value="{{ $d->id_disciplina }}">{{ $d->disciplina }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('deportista.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div> 
@endsection