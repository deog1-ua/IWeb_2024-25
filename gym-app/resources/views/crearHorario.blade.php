@extends('layouts.app')

@section('content')
<div class="container my-5">
    @if(session('message'))
        <div class="alert alert-success text-success text-success-emphasis alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger text-danger text-danger-emphasis alert-dismissible fade show mt-2" role="alert">
            <ul class="mb-0" style="list-style: none; padding-left: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h3>Crear Nuevo Horario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('horarios.store') }}" method="POST">
                        @csrf
                        
                        <!-- Fecha -->
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>

                        <!-- Hora Inicio -->
                        <div class="mb-3">
                            <label for="hora_inicio" class="form-label">Hora de Inicio</label>
                            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
                        </div>

                        <!-- Hora Fin -->
                        <div class="mb-3">
                            <label for="hora_fin" class="form-label">Hora de Fin</label>
                            <input type="time" class="form-control" id="hora_fin" name="hora_fin" required>
                        </div>

                        <!-- Sala -->
                        <div class="mb-3">
                            <label for="sala_id" class="form-label">Sala</label>
                            <select class="form-select" id="sala_id" name="sala_id" required>
                                <option value="" selected disabled>Selecciona una sala</option>
                                @foreach($salas as $sala)
                                    <option value="{{ $sala->id }}">{{ $sala->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Aforo -->
                        <div class="mb-3">
                            <label for="aforo" class="form-label">Aforo</label>
                            <input type="number" class="form-control" id="aforo" name="aforo" placeholder="Introduce el aforo de la sala" required>
                        </div>
                        <div class="mt-4 text-center actividad-estilos">

                            <button type="submit" class="btn w-100">Crear Horario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
