@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white text-center">
                    <h3>Crear Nueva Actividad</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('actividades.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la Actividad</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce el nombre de la actividad" required>
                        </div>

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Describe la actividad" required></textarea>
                        </div>

                        <!-- Fecha -->
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>

                        <!-- Horario -->
                        <div class="mb-3">
                            <label for="id_horario" class="form-label">Horario</label>
                            <select class="form-select" id="id_horario" name="id_horario" required disabled>
                                <option selected disabled>Selecciona una fecha primero</option>
                            </select>
                        </div>

                        <!-- Monitor -->
                        <div class="mb-3">
                            <label for="id_monitor" class="form-label">Monitor</label>
                            <select class="form-select" id="id_monitor" name="id_monitor" required>
                                <option selected disabled>Selecciona un monitor</option>
                                @foreach ($monitores as $monitor)
                                    <option value="{{ $monitor->id }}">{{ $monitor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Imagen -->
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen de la Actividad</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">Crear Actividad</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('fecha').addEventListener('change', function() {
    const fecha = this.value;

    fetch(`/horarios-por-fecha?fecha=${fecha}`)
        .then(response => response.json())
        .then(data => {
            const horarioSelect = document.getElementById('id_horario');
            horarioSelect.innerHTML = '<option selected disabled>Selecciona un horario</option>';
            
            if (data.length > 0) {
                data.forEach(horario => {
                    const option = document.createElement('option');
                    option.value = horario.id;
                    option.textContent = `${horario.hora_inicio} - ${horario.hora_fin} (Sala: ${horario.sala}, Aforo: ${horario.aforo})`;
                    horarioSelect.appendChild(option);
                });
                horarioSelect.disabled = false;
            } else {
                horarioSelect.innerHTML = '<option selected disabled>No hay horarios disponibles</option>';
                horarioSelect.disabled = true;
            }
        });
});
</script>
@endsection
