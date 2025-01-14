@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if (Auth::user()->tipo_usuario == "socio")
        <!-- Vista para Socio -->
        <div class="card card-dashboard shadow-lg text-center" style="border-radius: 10px;">
            <div class="card-body">
                <h5 class="card-title">¡Bienvenid@ {{ Auth::user()->nombre }}!</h5>
                <p class="card-text">Ahora puedes disfrutar de nuestras instalaciones al completo. Explora las opciones disponibles para sacar el máximo provecho a tu experiencia en nuestro gimnasio.</p>
                <hr class="my-4" style="border: 0.5px solid #ccc;">
                <div class="d-flex flex-wrap justify-content-center">
                    <a href="{{ url('/') }}" class="btn btn-outline-danger m-2">Inicio</a>
                    <a href="#" class="btn btn-outline-danger m-2">Mis Reservas</a>
                    <a href="{{ url('/perfil') }}" class="btn btn-outline-danger m-2">Mi Perfil</a>
                </div>
            </div>
        </div>
    @elseif (Auth::user()->tipo_usuario == "monitor")
        <!-- Vista para Monitor -->
        <div class="card card-dashboard shadow-lg text-center" style="border-radius: 10px;">
            <div class="card-body">
                <h5 class="card-title ">¡Bienvenid@ {{ Auth::user()->nombre }}!</h5>
                <p class="card-text">Has accedida a la plataforma del monitor para gestionar tus clases y horarios.</p>
                <hr class="my-4" style="border: 0.5px solid #ccc;">
                <div class="d-flex flex-wrap justify-content-center">
                    <a href="#" class="btn btn-outline-danger m-2">Mi Calendario</a>
                    <a href="{{ url('/perfil') }}" class="btn btn-outline-danger m-2">Mi Perfil</a>
                    <a href="{{ route('actividades.index') }}" class="btn btn-outline-danger m-2">Mis Actividades</a>
                </div>
            </div>
        </div>
    @elseif (Auth::user()->tipo_usuario == "admin")
        <!-- Vista para Administrador -->
        <div class="card card-dashboard shadow-lg text-center" style="border-radius: 10px;">
            <div class="card-body">
                <h5 class="card-title text-danger">¡Bienvenid@ {{ Auth::user()->nombre }}!</h5>
                <p class="card-text">Has accedido a la plataforma del administrador para gestionar la web de nuestro gimnasio.</p>
                <hr class="my-4" style="border: 0.5px solid #ccc;">
                <div class="d-flex flex-wrap justify-content-center">
                    <a href="#" class="btn btn-outline-danger m-2">Usuarios</a>
                    <a href="{{ url('/perfil') }}" class="btn btn-outline-danger m-2">Mi Perfil</a>
                    <a href="{{ route('actividades.index') }}" class="btn btn-outline-danger m-2">Gestionar Actividades</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
