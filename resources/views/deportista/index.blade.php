@extends('layout.app')

@section('Contenido')

<section class="container py-5">
  <div class="row justify-content-center">

    <div class="col-lg-12">

      <h1 class="mb-4 text-center">Listado de Deportistas</h1>

      <!-- Botón crear -->
      <div class="text-end mb-3">
        <a href="{{ route('deportista.create') }}" class="btn btn-success">
          <i class="bi bi-plus-circle"></i> Nuevo Deportista
        </a>
      </div>

      <!-- Mensaje éxito -->
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <!-- Tabla -->
      <table id="tbl_deportistas" class="table table-bordered table-striped table-hover align-middle">

        <thead class="table-success text-center">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha de Nacimiento</th>
            <th>Estatura (cm)</th>
            <th>Peso (kg)</th>
            <th>País</th>
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

            <td class="text-center">

              <!-- Editar -->
              <a href="{{ route('deportista.edit', $d->id_deportista) }}" 
                 class="btn btn-outline-warning btn-sm" title="Editar">
                <i class="bi bi-pencil"></i>
              </a>

              <!-- Eliminar SweetAlert -->
              <form action="{{ route('deportista.destroy', $d->id_deportista) }}" 
                    method="POST" 
                    class="d-inline form-eliminar">
                @csrf
                @method('DELETE')

                <button class="btn btn-outline-danger btn-sm" title="Eliminar">
                  <i class="bi bi-trash"></i>
                </button>
              </form>

            </td>
          </tr>
          @endforeach
        </tbody>

      </table>

    </div>

  </div>
</section>

@endsection

@push('scripts')

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTables con botones -->
<script>
$(document).ready(function () {

  $('#tbl_deportistas').DataTable({
    dom: 'Bfrtip',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
    }
  });

  // Confirmación de eliminar
  $('.form-eliminar').submit(function (e) {
    e.preventDefault();
    let form = this;

    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción no se puede deshacer.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });
  });

  // Mensaje de éxito
  @if (session('message'))
    Swal.fire({
      title: '¡Éxito!',
      text: '{{ session('message') }}',
      icon: 'success'
    });
  @endif

});
</script>

<!-- Estilos -->
<style>
  table#tbl_deportistas {
    width: 100%;
    table-layout: auto;
  }
  table#tbl_deportistas th, 
  table#tbl_deportistas td {
    white-space: nowrap;
    text-align: center;
  }
</style>

@endpush
