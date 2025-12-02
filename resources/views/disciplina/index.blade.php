<div class="container">
    <h2>Listado de Disciplinas</h2>

    <a href="{{ route('disciplina.create') }}" class="btn btn-primary mb-3">Nueva Disciplina</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Disciplina</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($disciplinas as $d)
                <tr>
                    <td>{{ $d->id_disciplina }}</td>
                    <td>{{ $d->disciplina }}</td>
                    <td>
                        <a href="{{ route('disciplina.edit', $d->id_disciplina) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('disciplina.destroy', $d->id_disciplina) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Seguro?')" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>