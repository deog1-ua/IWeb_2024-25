@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white text-center">
                    <h3>Editar Actividad</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('actividades.update', $actividad->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la Actividad</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $actividad->nombre }}" required>
                        </div>

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ $actividad->descripcion }}</textarea>
                        </div>

                        <!-- Importe -->
                        <div class="mb-3">
                            <label for="importe" class="form-label">Importe (€)</label>
                            <input type="number" step="0.01" class="form-control" id="importe" name="importe" value="{{ $actividad->importe }}" required>
                        </div>

                        <!-- Monitor -->
                        <div class="mb-3">
                        @if(auth()->user()->tipo_usuario === 'monitor')
                            <input type="hidden" name="id_monitor" value="{{ auth()->user()->id }}">
                            <p><strong>Monitor:</strong> {{ auth()->user()->nombre }} {{ auth()->user()->apellidos }}</p>
                        @else
                            <select class="form-select" id="id_monitor" name="id_monitor" required>
                                @foreach ($monitores as $monitor)
                                    <option value="{{ $monitor->id }}" {{ $actividad->usuario_id == $monitor->id ? 'selected' : '' }}>
                                        {{ $monitor->nombre }} {{ $monitor->apellidos }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                        </div>

                        <!-- Fecha -->
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ optional($actividad->horario->first())->fecha }}" required>
                        </div>

                        <!-- Horario -->
                        <div class="mb-3">
                            <label for="id_horario" class="form-label">Horario</label>
                            <select class="form-select" id="id_horario" name="id_horario" required>
                                <option value="" selected disabled>Selecciona un horario</option>
                                @foreach ($horarios as $horario)
                                    <option value="{{ $horario->id }}" {{ optional($actividad->horario->first())->id == $horario->id ? 'selected' : '' }}>
                                        {{ $horario->hora_inicio }} - {{ $horario->hora_fin }} (Sala: {{ $horario->sala }}, Aforo: {{ $horario->aforo }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Imagen -->
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen de la Actividad</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                            <p class="text-muted">Deja este campo vacío si no deseas cambiar la imagen actual.</p>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">Actualizar Actividad</button>
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
