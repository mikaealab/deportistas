@extends('layout.app')

@section('Contenido')

<br><br><br>
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-body p-5" style="background-color: #feffff;">

                <h2 class="text-center text-primary mb-4">Editar Deportista</h2>

                <hr class="mb-4">

                <form id="frm_editar_deportista" method="POST" action="{{ route('deportista.update', $deportista->id_deportista) }}">
                    @csrf
                    @method('PUT')

                    {{-- NOMBRE --}}
                    <label for="nombre">Nombre del deportista</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                           value="{{ $deportista->nombre }}">
                    <br>

                    {{-- FECHA NACIMIENTO --}}
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                           value="{{ $deportista->fecha_nacimiento }}">
                    <br>

                    {{-- ESTATURA --}}
                    <label for="estatura_cm">Estatura (cm)</label>
                    <input type="number" name="estatura_cm" id="estatura_cm" class="form-control"
                           value="{{ $deportista->estatura_cm }}">
                    <br>

                    {{-- PESO --}}
                    <label for="peso_kg">Peso (kg)</label>
                    <input type="number" name="peso_kg" id="peso_kg" class="form-control"
                           value="{{ $deportista->peso_kg }}">
                    <br>

                    {{-- PAÍS --}}
                    <label for="id_pais">País</label>
                    <select name="id_pais" id="id_pais" class="form-select">
                        <option value="">Seleccione</option>
                        @foreach($paises as $p)
                            <option value="{{ $p->id_pais }}" {{ $deportista->id_pais == $p->id_pais ? 'selected' : '' }}>
                                {{ $p->pais }}
                            </option>
                        @endforeach
                    </select>
                    <br>

                    {{-- DISCIPLINA --}}
                    <label for="id_disciplina">Disciplina</label>
                    <select name="id_disciplina" id="id_disciplina" class="form-select">
                        <option value="">Seleccione</option>
                        @foreach($disciplinas as $d)
                            <option value="{{ $d->id_disciplina }}" {{ $deportista->id_disciplina == $d->id_disciplina ? 'selected' : '' }}>
                                {{ $d->disciplina }}
                            </option>
                        @endforeach
                    </select>
                    <br>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-info btn-lg px-4 me-2 rounded-pill shadow">
                            <i class="fa fa-save me-1"></i> Actualizar
                        </button>

                        <a href="{{ route('deportista.index') }}"
                           class="btn btn-outline-danger btn-lg px-4 rounded-pill shadow">
                            <i class="fa fa-times me-1"></i> Cancelar
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

{{-- VALIDACIONES + SWEETALERT2 --}}
@push('scripts')
<script>
$("#frm_editar_deportista").validate({
    rules: {
        "nombre": { required: true, minlength: 3 },
        "fecha_nacimiento": { required: true },
        "estatura_cm": { required: true, number: true, min: 30 },
        "peso_kg": { required: true, number: true, min: 1 },
        "id_pais": { required: true },
        "id_disciplina": { required: true },
    },

    messages: {
        "nombre": { required: "Ingrese el nombre", minlength: "Debe tener mínimo 3 caracteres" },
        "fecha_nacimiento": { required: "Seleccione una fecha" },
        "estatura_cm": { required: "Ingrese la estatura", number: "Solo números", min: "Mínimo 30 cm" },
        "peso_kg": { required: "Ingrese el peso", number: "Solo números", min: "Peso inválido" },
        "id_pais": { required: "Seleccione un país" },
        "id_disciplina": { required: "Seleccione una disciplina" },
    },

    submitHandler: function(form) {

        Swal.fire({
            title: "¿Actualizar deportista?",
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
