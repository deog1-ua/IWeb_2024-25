@extends('layouts.app')

@section('content')
<div>
    <div class="imagen-fondo-claro" style="background: url('{{ asset('images/actividades.png') }}');">
        <h2>Apúntate con nosotros!</h2>
        <p>Consulta nuestros planes y tarifas </p>
        <div class="design-button">
        <a href="/" class="btn btn-primary btn-lg">Inscribirme</a>
        </div>
    </div>
</div>
<div style="margin-bottom: 80px;">
    <h1 class="titulo2 text-center ">Actividades grupales guiadas</h1>
    <p class="parrafo2">Atrévete a probar nuestras clases y actividades guiadas por los mejores profesionales</p>
</div>
<div class="container">
    <div class="row mb-4">
        @foreach($actividades as $index => $actividad)
            <div class="col-md-3 mb-4">
                <div class="card h-100 d-flex flex-column">
                    <img src="{{asset('storage/images/' . $actividad->imagen) }}" class="card-img-top" alt="{{ $actividad->nombre }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center">{{ $actividad->nombre }}</h5>
                        <p class="card-text text-center">{{ $actividad->descripcion }}</p>
                        <p class="card-text text-center">Con: {{ $actividad->user->nombre }} {{$actividad->user->apellidos}}</p>
                        <!-- Botón centrado y agrandado -->
                        <div class="mt-auto d-flex justify-content-center">
                            <a href="{{ route('actividades.showpublico', $actividad->id) }}" class="btn btn-primary btn-lg w-75">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            @if(($index + 1) % 4 == 0)
                </div>
                <div class="row my-5">
            @endif
        @endforeach
    </div>
</div>
@endsection
