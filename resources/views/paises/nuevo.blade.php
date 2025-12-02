@extends('layout.app')

@section('Contenido')
<div class="container">
    <h2>Nuevo País</h2>

    <form action="{{ route('paises.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre del país</label>
            <input type="text" name="pais" class="form-control" required>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('paises.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection

