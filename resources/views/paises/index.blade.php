
<div class="container">
    <h2>Listado de Países</h2>

    <a href="{{ route('paises.create') }}" class="btn btn-primary mb-3">Nuevo País</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>País</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $p)
                <tr>
                    <td>{{ $p->id_pais }}</td>
                    <td>{{ $p->pais }}</td>
                    <td>
                        <a href="{{ route('paises.edit', $p->id_pais) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('paises.destroy', $p->id_pais) }}" method="POST" style="display:inline;">
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

