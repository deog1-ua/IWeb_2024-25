@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h3>Detalles de la Actividad</h3>
                </div>
                <div class="card-body">
                    <!-- Imagen -->
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('storage/images/' . $actividad->imagen) }}" alt="Imagen de {{ $actividad->nombre }}" class="rounded" style="width: 200px; height: 200px; object-fit: cover;">
                    </div>

                    <!-- Detalles de la Actividad -->
                    <h4>{{ $actividad->nombre }}</h4>
                    <p class="mb-1"><strong>Descripción:</strong> {{ $actividad->descripcion }}</p>
                    <p class="mb-1"><strong>Precio:</strong> €{{ number_format($actividad->importe, 2) }}</p>
                    <p class="mb-1"><strong>Monitor:</strong> {{ $actividad->user->nombre }} {{ $actividad->user->apellidos }}</p>

                    <!-- Horarios -->
                    <h5 class="mt-4">Horarios</h5>
                    @if($actividad->horario->isNotEmpty())
                        <ul class="list-group">
                            @foreach($actividad->horario as $horario)
                                <li class="list-group-item">
                                    <strong>Fecha:</strong> {{ $horario->fecha }} <br>
                                    <strong>Hora:</strong> {{ $horario->hora_inicio }} - {{ $horario->hora_fin }} <br>
                                    <strong>Sala:</strong> {{ $horario->sala->nombre }} <br>
                                    <strong>Aforo:</strong> {{ $horario->aforo }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No hay horarios asignados a esta actividad.</p>
                    @endif

                    <div class="mt-4 text-center actividad-estilos">
                        <a href="{{ route('actividades.index') }}" class="btn a-volver me-2">
                            Volver al Listado
                        </a>
                        <form action="{{ route('actividades.destroy', $actividad->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta actividad? Esta acción no se puede deshacer.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger me-2 button-general-transparente">
                                Eliminar
                            </button>
                        </form>
                        <a href="{{ route('actividades.edit', $actividad->id) }}" class="btn">
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
