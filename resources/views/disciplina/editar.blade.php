@extends('layout.app')

@section('Contenido')

<br><br><br>
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-body p-5" style="background-color: #feffff;">

                <h2 class="text-center text-primary mb-4">Editar Disciplina</h2>

                <hr class="mb-4">

                <form id="frm_editar_disciplina" method="POST" action="{{ route('disciplina.update', $disciplina->id_disciplina) }}">
                    @csrf
                    @method('PUT')

                    <label for="disciplina">Nombre de la disciplina</label>
                    <input type="text" name="disciplina" id="disciplina" class="form-control"
                        value="{{ $disciplina->disciplina }}">
                    <br>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-4 me-2 rounded-pill shadow">
                            <i class="fa fa-save me-1"></i> Actualizar
                        </button>

                        <a href="{{ route('disciplina.index') }}"
                           class="btn btn-outline-danger btn-lg px-4 rounded-pill shadow">
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
$("#frm_editar_disciplina").validate({
    rules: {
        "disciplina": { required: true, minlength: 3 }
    },

    messages: {
        "disciplina": {
            required: "Ingrese el nombre de la disciplina",
            minlength: "Debe tener mínimo 3 caracteres"
        }
    },

    submitHandler: function(form) {

        Swal.fire({
            title: "¿Actualizar disciplina?",
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
