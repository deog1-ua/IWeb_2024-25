@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if(session('message'))
        <div class="alert alert-success text-success text-success-emphasis alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card card-perfil shadow-sm bg-light" style="border-radius: 10px; padding: 20px;">
        <h3 class="text-center mb-4">Mi Perfil</h3>

        <!-- Datos de la Cuenta -->
        <h6 class="mb-0">DATOS DE LA CUENTA</h6>
        <hr class="my-4 mt-0">
        <div class="row align-items-center mb-4">
            <!-- Foto de Perfil -->
            <div class="col-md-6 d-flex flex-column align-items-center">
                <img src="/storage/{{ $user->imagen ?? '/images-profile/user-default.jpg' }}" 
                     alt="Foto de Perfil" 
                     style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
            </div>

            <!-- Datos de la Cuenta -->
            <div class="col-md-6">
                <p><strong>Nombre de Usuario:</strong> {{ $user->nombre_usuario }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <a href="/perfil/modificar-password" class="btn mt-3">Cambiar Contraseña</a>
            </div>
        </div>

        <!-- Datos Personales -->
        <div>
            <h6 class="mb-0 mt-5">DATOS PERSONALES</h6>
            <hr class="my-4 mt-0">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>DNI:</strong> {{ $user->dni }}</p>
                    <p><strong>Nombre:</strong> {{ $user->nombre }}</p>
                    <p><strong>Apellidos:</strong> {{ $user->apellidos }}</p>    
                </div>
                <div class="col-md-6">
                    <p><strong>Fecha de Nacimiento:</strong> {{ $user->fecha_nacimiento }}</p>
                    <p><strong>Teléfono:</strong> {{ $user->telefono }}</p>
                    <p><strong>Género:</strong> {{ $user->genero }}</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <p><strong>Peso:</strong> {{ $user->peso }} kg</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Altura:</strong> {{ $user->altura }} cm</p>
                </div>
            </div>
        </div>


        <!-- Datos de Dirección -->
        <div>
        <h6 class="mb-0 mt-5">DIRECCIÓN</h6>
        <hr class="my-4 mt-0">
        <div class="row">
                <div class="col-md-6">
                    <p><strong>Dirección:</strong> {{ $direccion->direccion_envio }} </p>
                    <p><strong>Municipio:</strong> {{ $direccion->municipio }}</p>
                    <p><strong>Código Postal:</strong> {{ $direccion->cp }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Provincia:</strong> {{ $direccion->provincia }}</p>
                    <p><strong>País:</strong> {{ $direccion->pais }}</p>
                </div>
        </div>

        <hr class="my-4">

        <!-- Botones -->
        <div class="text-center">
            <a href="/perfil/modificar" class="btn mb-2">Modificar Datos</a>

            @if (Auth::user()->tipo_usuario == "socio" )
                <a href="/perfil/dar-baja" class="btn mb-2">Darme de Baja</a>
            @endif
        </div>
    </div>
</div>

@endsection
