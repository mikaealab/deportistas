@extends('layout.app')

@section('Contenido')
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
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.form-eliminar');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    @if (session('message'))
        Swal.fire({
            title: '¡Éxito!',
            text: '{{ session('message') }}',
            icon: 'success'
        });
    @endif
});
</script>
@endpush
