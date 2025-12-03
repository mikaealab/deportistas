@extends('layout.app')

@push('styles')
<style>
    label.error {
        color: red;
        font-size: 14px;
        margin-top: 4px;
    }
</style>
@endpush

@section('Contenido')
<br><br>

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5" style="background-color: #feffff;">

                <h2 class="text-center text-success mb-4">Nueva Disciplina</h2>
                <hr class="mb-4">

                <form id="frm_disciplina" method="POST" action="{{ route('disciplina.store') }}">
                    @csrf

                    <label for="disciplina">Nombre de la disciplina</label>
                    <input type="text" name="disciplina" id="disciplina" class="form-control" required
                    value="{{ old('disciplina') }}">
                    @error ('disciplina')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br>

                    <div class="text-center mt-4">
                        <button class="btn btn-success btn-lg px-4 me-2 rounded-pill shadow" type="submit">
                            <i class="fa fa-save me-1"></i> Guardar
                        </button>

                        <button type="button" id="btn_cancelar" class="btn btn-outline-danger btn-lg px-4 rounded-pill shadow">
                            <i class="fa fa-times me-1"></i> Cancelar
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<br><br>

@endsection

@push('scripts')
<script>
$(document).ready(function () {

    $("#frm_disciplina").validate({
        rules: {
            "disciplina": { required: true, minlength: 3 }
        },
        messages: {
            "disciplina": {
                required: "Ingrese el nombre de la disciplina",
                minlength: "La disciplina debe tener mínimo 3 caracteres"
            }
        },

        submitHandler: function (form) {

            Swal.fire({
                title: "¿Guardar Disciplina?",
                text: "Se registrará la nueva disciplina en el sistema.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Sí, guardar",
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#198754",
                cancelButtonColor: "#dc3545"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // PROCEDE A GUARDAR
                }
            });

        }
    });

    $("#btn_cancelar").click(function () {
        Swal.fire({
            title: "¿Cancelar registro?",
            text: "Se perderán los datos ingresados.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, salir",
            cancelButtonText: "Volver",
            confirmButtonColor: "#dc3545",
            cancelButtonColor: "#6c757d"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('disciplina.index') }}";
            }
        });
    });

});
</script>
@endpush
