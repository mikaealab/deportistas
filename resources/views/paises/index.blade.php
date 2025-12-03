@extends('layout.app')

@section('Contenido')

<section class="container py-5">
  <div class="row justify-content-center">

    <div class="col-lg-12">

      <h1 class="mb-4 text-center">Listado de Países</h1>

      <!-- Botón crear -->
      <div class="text-end mb-3">
        <a href="{{ route('paises.create') }}" class="btn btn-success">
          <i class="bi bi-plus-circle"></i> Nuevo País
        </a>
      </div>

      <!-- Mensaje de éxito -->
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <!-- Tabla -->
      <table id="tbl_paises" class="table table-bordered table-striped table-hover align-middle">

        <thead class="table-success text-center">
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

            <td class="text-center">

              <!-- Editar -->
              <a href="{{ route('paises.edit', $p->id_pais) }}" class="btn btn-outline-warning btn-sm" title="Editar">
                <i class="bi bi-pencil"></i>
              </a>

              <!-- Eliminar SweetAlert -->
              <form action="{{ route('paises.destroy', $p->id_pais) }}" 
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

<!-- DataTables -->
<script>
  $(document).ready(function () {

    // Inicializar DataTables con exportaciones
    $('#tbl_paises').DataTable({
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

    // Mensaje de éxito con SweetAlert
    @if (session('message'))
      Swal.fire({
        title: '¡Éxito!',
        text: '{{ session('message') }}',
        icon: 'success'
      });
    @endif

  });
</script>

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: '¡No se puede eliminar!',
        text: '{{ session('error') }}',
        confirmButtonColor: '#d33',
    });
</script>
@endif

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Operación exitosa!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3085d6',
    });
</script>
@endif


<!-- Estilos para la tabla -->
<style>
  table#tbl_paises {
    width: 100%;
    table-layout: auto;
  }
  table#tbl_paises th, table#tbl_paises td {
    white-space: nowrap;
    text-align: center;
  }
</style>
@endpush
