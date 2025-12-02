<div class="container">
    <h2>Editar Deportista</h2>

    <form action="{{ route('deportista.update', $deportista->id_deportista) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $deportista->nombre }}" required>
        </div>

        <div class="mb-3">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $deportista->fecha_nacimiento }}" required>
        </div>

        <div class="mb-3">
            <label>Estatura (cm)</label>
            <input type="number" name="estatura_cm" class="form-control" value="{{ $deportista->estatura_cm }}" required>
        </div>

        <div class="mb-3">
            <label>Peso (kg)</label>
            <input type="number" name="peso_kg" class="form-control" value="{{ $deportista->peso_kg }}" required>
        </div>

        <div class="mb-3">
            <label>Pais</label>
            <select name="id_pais" class="form-select" required>
                <option value="">Seleccione</option>
                @foreach($paises as $p)
                    <option value="{{ $p->id_pais }}" {{ $deportista->id_pais == $p->id_pais ? 'selected' : '' }}>{{ $p->pais }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Disciplina</label>
            <select name="id_disciplina" class="form-select" required>
                <option value="">Seleccione</option>
                @foreach($disciplinas as $d)
                    <option value="{{ $d->id_disciplina }}" {{ $deportista->id_disciplina == $d->id_disciplina ? 'selected' : '' }}>{{ $d->disciplina }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('deportista.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>