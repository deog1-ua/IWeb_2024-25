@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
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
            <h2 class="text-center mb-4">Listado de Actividades</h2>
            @if($actividades->isEmpty())
                <p class="text-center text-muted">No hay actividades disponibles.</p>
            @else
                <ul class="list-group">
                    @foreach($actividades as $actividad)
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <!-- Imagen de la actividad -->
                                <img src="{{ asset('storage/images/' . $actividad->imagen) }}" alt="Imagen de {{ $actividad->nombre }}" class="rounded" style="width: 80px; height: 80px; object-fit: cover; margin-right: 15px;">

                                <!-- Detalles de la actividad -->
                                <div>
                                    <h5 class="mb-1">{{ $actividad->nombre }}</h5>
                                    <p class="mb-0 text-muted">Precio: €{{ number_format($actividad->importe, 2) }}</p>
                                    <p class="mb-0 text-muted">Monitor: 
                                        @if($actividad->user)
                                            {{ $actividad->user->nombre }} {{ $actividad->user->apellidos }}
                                        @else
                                            No asignado
                                        @endif
                                    </p>
                                    @if($actividad->horario->isNotEmpty())
                                        <p class="mb-0 text-muted">Fecha: {{ $actividad->horario->sortBy('fecha')->first()->fecha }}</p>
                                    @else
                                        <p class="mb-0 text-muted">Fecha: No asignada</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Botones de acción -->
                            <div>
                                <a href="{{ route('actividades.show', $actividad->id) }}" class="btn btn-danger btn-sm a-general-detalles">Detalles</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

             <!-- Botón para ir a la página de crear actividades -->
             <div class="mt-4 text-center">
                <a href="{{ route('actividades.create') }}" class="btn btn-danger a-general">Crear Nueva Actividad</a>
            </div>
        </div>
    </div>
</div>
@endsection
