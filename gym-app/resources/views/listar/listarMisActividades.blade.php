@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="titulo1">Mis Actividades</h1>
    <div class="container">
        <div class="row mb-4">
            @foreach($actividades as $index => $actividad)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 d-flex flex-column">
                        <img src="{{asset('storage/images/' . $actividad->imagen) }}" class="card-img-top" alt="{{ $actividad->nombre }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $actividad->nombre }}</h5>
                            <p class="card-text text-center">Con: {{ $actividad->user->nombre }} {{$actividad->user->apellidos}}</p>
                            <div class="mt-auto d-flex justify-content-center">
                                <a href="/mis-actividades/{{ $actividad->id }}" class="btn btn-primary btn-block">Detalles</a>
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
</div>
@endsection
