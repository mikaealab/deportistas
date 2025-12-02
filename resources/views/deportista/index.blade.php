<div class="container">
    <h2>Listado de Deportistas</h2>

    <a href="{{ route('deportista.create') }}" class="btn btn-primary mb-3">Nuevo Deportista</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha de Nacimiento</th>
                <th>Estatura (cm)</th>
                <th>Peso (kg)</th>
                <th>Pais</th>
                <th>Disciplina</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deportistas as $d)
                <tr>
                    <td>{{ $d->id_deportista }}</td>
                    <td>{{ $d->nombre }}</td>
                    <td>{{ $d->fecha_nacimiento }}</td>
                    <td>{{ $d->estatura_cm }}</td>
                    <td>{{ $d->peso_kg }}</td>
                    <td>{{ $d->pais->pais }}</td>
                    <td>{{ $d->disciplina->disciplina }}</td>
                    <td>
                        <a href="{{ route('deportista.edit', $d->id_deportista) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('deportista.destroy', $d->id_deportista) }}" method="POST" style="display:inline;">
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