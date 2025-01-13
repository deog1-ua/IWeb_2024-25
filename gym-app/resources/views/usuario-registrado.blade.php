@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card card-registrado shadow-lg" style="width: 24rem; border-radius: 10px;">
        <div class="card-body text-center">
            <h5 class="card-title text-success mb-3">¡Registro Exitoso!</h5>
            <p class="card-text">Tu solicitud ha sido registrada correctamente. Ahora estás a la espera de que el administrador confirme tu registro.</p>
            <hr class="my-4" style="border: 0.5px solid #ccc;">
            <a href="{{ url('/') }}" class="btn btn-outline-danger">Volver a Inicio</a>
        </div>
    </div>
</div>
@endsection