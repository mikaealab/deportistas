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

                <h2 class="text-center text-success mb-4">Nuevo País</h2>
                <hr class="mb-4">

                <form id="frm_pais" method="POST" action="{{ route('paises.store') }}">
                    @csrf

                    <label for="pais">Nombre del país</label>
                    <input type="text" name="pais" id="pais" class="form-control" required
                    value="{{ old('pais') }}">
                    @error ('pais')
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


    $("#frm_pais").validate({
        rules: {
            "pais": { required: true, minlength: 3 }
        },
        messages: {
            "pais": {
                required: "Ingrese el nombre del país",
                minlength: "El nombre debe tener mínimo 3 caracteres"
            }
        },


        submitHandler: function (form) {

            Swal.fire({
                title: "¿Guardar País?",
                text: "Se registrará el nuevo país en el sistema.",
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
                window.location.href = "{{ route('paises.index') }}";
            }
        });
    });

});
</script>
@endpush
