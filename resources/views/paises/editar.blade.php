<div class="container">
    <h2>Editar País</h2>

    <form action="{{ route('paises.update', $pais->id_pais) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre del país</label>
            <input type="text" name="pais" class="form-control" value="{{ $pais->pais }}" required>
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('paises.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>