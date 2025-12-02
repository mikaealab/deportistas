<div class="container">
    <h2>Nueva Disciplina</h2>

    <form action="{{ route('disciplina.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Disciplina</label>
            <input type="text" name="disciplina" class="form-control" required>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('disciplina.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>