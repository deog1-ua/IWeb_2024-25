@extends('layouts.app')

@section('content')
<div class="contenedor">
    <div class="row justify-content-center">
        <div class="col-lg-8 d-flex align-items-center">
            <!-- Contenedor de texto -->
            <div class="col-md-7">
                <h2 class="titulo3">{{$actividad->nombre}}</h2>
                @if($actividad->user->genero == 'mujer')
                    <p class="subtitulo1">Profesora: {{$actividad->user->nombre}} {{$actividad->user->apellidos}}</p>
                @else
                    <p class="subtitulo1">Profesor: {{$actividad->user->nombre}} {{$actividad->user->apellidos}}</p>
                @endif

                <h3 class="titulo4">¿Qué es el {{$actividad->nombre}}?</h3>
                <p class="parrafo3">{{$actividad->descripcion}}</p>
                <p class="parrafo4"><strong>Precio:</strong> €{{ number_format($actividad->importe, 2) }}</p>
            </div>
            <!-- Contenedor de imagen -->
            <div class="col-md-5 d-flex justify-content-end">
                <img src="{{ asset('storage/images/' . $actividad->imagen) }}" alt="Imagen de {{ $actividad->nombre }}" 
                    class="img-fluid rounded" 
                    style="max-width: 100%; height: auto; max-height: 500px; width: auto;">
            </div>
        </div>
        <div class="col-lg-8">
    <hr>
    @php
        use Carbon\Carbon;
        $contador = 0;
    @endphp
    <div style="margin-top: 30px; margin-bottom: 50px;"> 
        <h3 class="titulo4">¿Cuándo puedo asistir?</h3>
        
        @if($actividad->horario->isNotEmpty())
            <ul class="list-group mx-auto" style="max-width: 900px;">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" id="error-alert" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @foreach($actividad->horario as $horario)
                @if($horario->fecha >= Carbon::now()->toDateString())
                    <li class="list-group-item d-flex justify-content-between align-items-center border rounded shadow-sm p-3 mb-2">
                    <div>
                        @php
                            $contador++;
                            $fechaFormateada = Carbon::parse($horario->fecha)->locale('es')->isoFormat('dddd D, MMMM [de] YYYY');
                            $horaInicioFormateada = \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') . 'h';
                            $horaFinFormateada = \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') . 'h';
                        @endphp
                        <h5 class="text-dark mb-1"><strong>Fecha:</strong> {{ ucfirst($fechaFormateada) }}</h5>
                        <p class="mb-1">
                            <strong>Hora:</strong> {{ $horaInicioFormateada }} - {{ $horaFinFormateada }} <br>
                            <strong>Sala:</strong> {{ $horario->sala->nombre }}
                        </p>
                    </div>
                    @if(Auth::check())
                        @php

                            $yaReservado = \App\Models\Reserva::where('usuario_id', auth()->user()->id)
                                                ->where('horario_id', $horario->id)
                                                ->exists();
                        @endphp
                        @if(Auth::user()->tipo_usuario == "socio")
                            <div class="text-center">
                                @if($yaReservado)
                                    <a class="btn btn-outline-danger btn-sm disabled" href="#" tabindex="-1" role="button" aria-disabled="true" 
                                        style="border: 2px solid red; color: red; background-color: white;">
                                        Reservado
                                    </a>
                                    <a class="btn btn-secondary btn-sm mt-1" href="{{ route('cancelar', $horario->id) }}">Cancelar</a>
                                @else
                                    <form method="POST" action="{{ route('reservar') }}">
                                        @csrf
                                        <input type="hidden" name="horario_id" value="{{ $horario->id }}">
                                        <input type="hidden" name="precio" value="{{ $horario->actividad->importe }}">
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm mt-1">
                                            Reservar
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    @endif
                    </li>
                @endif


                @endforeach
            </ul>
        @if($contador == 0)
            <p class="text-muted text-center mt-4">No hay horarios asignados a esta actividad.</p>
        @endif
        @else
            <p class="text-muted text-center mt-4">No hay horarios asignados a esta actividad.</p>
        @endif
    </div>
</div>
        
<script>
    // Función para ocultar las alertas después de 5 segundos
    setTimeout(function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');

        if (successAlert) {
            successAlert.style.display = 'none';
        }

        if (errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 5000); // 3000 milisegundos = 3 segundos
</script>
@endsection
