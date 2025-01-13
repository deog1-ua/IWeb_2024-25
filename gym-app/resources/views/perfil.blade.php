@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm bg-light" style="border-radius: 10px; padding: 20px;">
        <h3 class="text-center mb-4">Perfil de Usuario</h3>
        <hr class="my-4">
        <div class="row">
            <!-- Nombre y Apellidos -->
            <div class="col-md-6">
                <h6><strong>Nombre:</strong> {{ Auth::user()->nombre }}</h6>
                <h6><strong>Apellidos:</strong> {{ Auth::user()->apellidos }}</h6>
            </div>
            <!-- DNI y Fecha de Nacimiento -->
            <div class="col-md-6">
                <h6><strong>DNI:</strong> {{ Auth::user()->dni }}</h6>
                <h6><strong>Fecha de Nacimiento:</strong> {{ Auth::user()->fecha_nacimiento }}</h6>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <!-- Teléfono y Género -->
            <div class="col-md-6">
                <h6><strong>Teléfono:</strong> {{ Auth::user()->telefono }}</h6>
                <h6><strong>Género:</strong> {{ Auth::user()->genero }}</h6>
            </div>
            <!-- Peso y Altura -->
            <div class="col-md-6">
                <h6><strong>Peso:</strong> {{ Auth::user()->peso }} kg</h6>
                <h6><strong>Altura:</strong> {{ Auth::user()->altura }} cm</h6>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <!-- Dirección -->
            <div class="col-md-12">
                <h6><strong>Dirección:</strong> {{ Auth::user()->direccion_envio }}, 
                    {{ Auth::user()->municipio }}, {{ Auth::user()->provincia }}, 
                    {{ Auth::user()->cp }}, {{ Auth::user()->pais }}</h6>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <!-- Datos de la Cuenta -->
            <div class="col-md-6">
                <h6><strong>Nombre de Usuario:</strong> {{ Auth::user()->nombre_usuario }}</h6>
                <h6><strong>Email:</strong> {{ Auth::user()->email }}</h6>
            </div>
        </div>
        <hr class="my-4">
        <!-- Botones -->
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <a href="/perfil/modificar" class="btn btn-primary w-100 mb-2">Modificar Datos</a>
            </div>
            <div class="col-md-4 text-center">
                <form action="/perfil/dar-baja" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas darte de baja?');">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Darse de Baja</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
