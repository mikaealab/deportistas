@extends('layout.app')

@section('Contenido')

<br><br><br>
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-body p-5" style="background-color: #feffff;">

                <h2 class="text-center text-success mb-4">Editar País</h2>

                <hr class="mb-4">

                <form id="frm_editar_pais" method="POST" action="{{ route('paises.update', $pais->id_pais) }}">
                    @csrf
                    @method('PUT')

                    <label for="pais">Nombre del país</label>
                    <input type="text" name="pais" id="pais" class="form-control" value="{{ $pais->pais }}">
                    <br>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success btn-lg px-4 me-2 rounded-pill shadow">
                            <i class="fa fa-save me-1"></i> Actualizar
                        </button>

                        <a href="{{ route('paises.index') }}" class="btn btn-outline-danger btn-lg px-4 rounded-pill shadow">
                            <i class="fa fa-times me-1"></i> Cancelar
                        </a>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>

{{-- VALIDACIONES + SWEETALERT --}}
@push('scripts')
<script>
$("#frm_editar_pais").validate({
    rules: {
        "pais": { required: true, minlength: 3 }
    },

    messages: {
        "pais": {
            required: "Ingrese el nombre del país",
            minlength: "Debe tener mínimo 3 caracteres"
        }
    },

    submitHandler: function(form) {

        Swal.fire({
            title: "¿Actualizar país?",
            text: "Se guardarán los cambios realizados",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, actualizar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
});
</script>
@endpush

<br><br><br>
@endsection
