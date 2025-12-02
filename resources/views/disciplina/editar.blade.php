@extends('layout.app')

@section('Contenido')
<div class="container">
    <h2>Editar Disciplina</h2>

    <form action="{{ route('disciplina.update', $disciplina->id_disciplina) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Disciplina</label>
            <input type="text" name="disciplina" class="form-control" value="{{ $disciplina->disciplina }}" required>
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('disciplina.index') }}" class="btn btn-secondary">Volver</a>
    </form> 
</div>
@endsection