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

                <h2 class="text-center text-success mb-4">Nuevo Deportista</h2>
                <hr class="mb-4">

                <form id="frm_deportista" method="POST" action="{{ route('deportista.store') }}">
                    @csrf

                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                    <br>

                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                    <br>

                    <label for="estatura_cm">Estatura (cm)</label>
                    <input type="number" name="estatura_cm" id="estatura_cm" class="form-control" required min="50" max="300">
                    <br>

                    <label for="peso_kg">Peso (kg)</label>
                    <input type="number" name="peso_kg" id="peso_kg" class="form-control" required min="20" max="300">
                    <br>

                    <label for="id_pais">País</label>
                    <select name="id_pais" id="id_pais" class="form-select" required>
                        <option value="">Seleccione</option>
                        @foreach($paises as $p)
                            <option value="{{ $p->id_pais }}">{{ $p->pais }}</option>
                        @endforeach
                    </select>
                    <br>

                    <label for="id_disciplina">Disciplina</label>
                    <select name="id_disciplina" id="id_disciplina" class="form-select" required>
                        <option value="">Seleccione</option>
                        @foreach($disciplinas as $d)
                            <option value="{{ $d->id_disciplina }}">{{ $d->disciplina }}</option>
                        @endforeach
                    </select>
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

    $("#frm_deportista").validate({
        rules: {
            nombre: { required: true, minlength: 3 },
            fecha_nacimiento: { required: true },
            estatura_cm: { required: true, number: true, min: 50, max: 300 },
            peso_kg: { required: true, number: true, min: 20, max: 300 },
            id_pais: { required: true },
            id_disciplina: { required: true }
        },
        messages: {
            nombre: {
                required: "Ingrese el nombre del deportista",
                minlength: "Debe tener mínimo 3 caracteres"
            },
            fecha_nacimiento: { required: "Seleccione la fecha de nacimiento" },
            estatura_cm: {
                required: "Ingrese la estatura",
                number: "Debe ser un número",
                min: "Valor mínimo 50 cm",
                max: "Valor máximo 300 cm"
            },
            peso_kg: {
                required: "Ingrese el peso",
                number: "Debe ser un número",
                min: "Valor mínimo 20 kg",
                max: "Valor máximo 300 kg"
            },
            id_pais: { required: "Seleccione un país" },
            id_disciplina: { required: "Seleccione una disciplina" }
        },

        submitHandler: function (form) {

            Swal.fire({
                title: "¿Guardar Deportista?",
                text: "Se registrará el nuevo deportista.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Sí, guardar",
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#198754",
                cancelButtonColor: "#dc3545"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
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
                window.location.href = "{{ route('deportista.index') }}";
            }
        });
    });

});
</script>
@endpush
