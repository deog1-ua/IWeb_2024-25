@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white text-center">
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
                            <label for="sala" class="form-label">Sala</label>
                            <input type="text" class="form-control" id="sala" name="sala" placeholder="Introduce el nombre de la sala" required>
                        </div>

                        <!-- Aforo -->
                        <div class="mb-3">
                            <label for="aforo" class="form-label">Aforo</label>
                            <input type="number" class="form-control" id="aforo" name="aforo" placeholder="Introduce el aforo de la sala" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">Crear Horario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
