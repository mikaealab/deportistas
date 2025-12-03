@extends('layout.app')

@section('Contenido')

<br><br>
<div class="container">

    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Sistema de Gestión Deportiva</h1>
        <p class="text-muted fs-5">Administra países, disciplinas y deportistas de manera sencilla y eficiente.</p>
    </div>

    <div class="row justify-content-center">

        {{-- TARJETA PAÍSES --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 rounded-4 h-100">
                <div class="card-body text-center p-4">
                    <i class="fa fa-flag text-danger fs-1 mb-3"></i>
                    <h4 class="fw-bold mb-3">Países</h4>
                    <p class="text-muted">Administra la lista de países disponibles en el sistema.</p>
                    <a href="{{ route('paises.index') }}" class="btn btn-danger rounded-pill px-4">
                        <i class="fa fa-arrow-right me-1"></i> Ir a Países
                    </a>
                </div>
            </div>
        </div>

        {{-- TARJETA DISCIPLINAS --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 rounded-4 h-100">
                <div class="card-body text-center p-4">
                    <i class="fa fa-dumbbell text-primary fs-1 mb-3"></i>
                    <h4 class="fw-bold mb-3">Disciplinas</h4>
                    <p class="text-muted">Gestiona todas las disciplinas deportivas registradas.</p>
                    <a href="{{ route('disciplina.index') }}" class="btn btn-primary rounded-pill px-4">
                        <i class="fa fa-arrow-right me-1"></i> Ir a Disciplinas
                    </a>
                </div>
            </div>
        </div>

        {{-- TARJETA DEPORTISTAS --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 rounded-4 h-100">
                <div class="card-body text-center p-4">
                    <i class="fa fa-users text-success fs-1 mb-3"></i>
                    <h4 class="fw-bold mb-3">Deportistas</h4>
                    <p class="text-muted">Registra y administra deportistas con su información completa.</p>
                    <a href="{{ route('deportista.index') }}" class="btn btn-success rounded-pill px-4">
                        <i class="fa fa-arrow-right me-1"></i> Ir a Deportistas
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>
<br><br>

@endsection
