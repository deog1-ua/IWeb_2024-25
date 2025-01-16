@extends('layouts.app')

@section('content')
<div class="navbar">
    <div class="navbar-buttons">
        <button onclick="window.location.href='{{ route('usuarios.index') }}'">Usuarios</button>
        <button onclick="window.location.href='{{ route('usuarios.pendientes') }}'">Pendientes</button>
    </div>

    <!-- Formulario de búsqueda con un botón de búsqueda al lado -->
    <div class="search-bar">
        <form method="GET" action="{{ route('usuarios.index') }}" style="width: 100%; display: flex;">
            <input type="text" name="search" placeholder="Buscar..." value="{{ request()->get('search') }}">
            <button type="submit">Buscar</button>
        </form>
    </div>
</div>

<div id="content">
    @if(session('message'))
        <div class="alert alert-success text-success text-success-emphasis alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @isset($usuarios) <!-- Mostrar solo si estamos en la vista de usuarios activos -->
        <h2>Usuarios Activos</h2>
        <div class="user-list">
            @foreach($usuarios as $usuario)
            <div class="user-item">
                <img src="/storage/{{ $usuario->imagen ?? '/images-profile/user-default.jpg' }}" alt="User Photo">
                <div class="user-details">
                    <strong>{{ $usuario->nombre }} {{ $usuario->apellidos }}</strong><br>
                    <span>{{ $usuario->email }}</span><br>
                    <span>{{ $usuario->telefono }}</span>

                    <!-- Indicar si el usuario está bloqueado -->
                    @if($usuario->bloqueado)
                        <span class="blocked">Usuario bloqueado</span>
                    @endif
                </div>
                <!-- Solo mostrar el botón de bloquear si el usuario no está bloqueado -->
                @if(!$usuario->bloqueado && $usuario->tipo_usuario == 'socio')
                <form action="{{ route('usuarios.bloquear', $usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="block-button" type="submit">Bloquear</button>
                </form>
                @endif
                @if($usuario->bloqueado && $usuario->tipo_usuario == 'socio')
                <form action="{{ route('usuarios.desbloquear', $usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-secondary" type="submit">Desbloquear</button>
                </form>
                @endif
            
            </div>
            @endforeach
        </div>
    @endisset

    @isset($pendientes) <!-- Mostrar solo si estamos en la vista de usuarios pendientes -->
        <h2>Usuarios Pendientes</h2>
        <div class="user-list">
            @foreach($pendientes as $pendiente)
            <div class="user-item">
                <img src="/storage/{{ $user->imagen ?? '/images-profile/user-default.jpg' }}"  alt="User Photo">
                <div class="user-details">
                    <strong>{{ $pendiente->nombre }} {{ $pendiente->apellidos }}</strong><br>
                    <span>{{ $pendiente->email }}</span><br>
                    <span>{{ $pendiente->telefono }}</span>
                </div>
                <form action="{{ route('usuarios.aprobar', $pendiente->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="block-button me-2" type="submit">Aprobar</button>
                </form>
                <form action="{{ route('usuarios.rechazar', $pendiente->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="reject-button me-2" type="submit">Rechazar</button>
                </form>
            </div>
            @endforeach
        </div>
    @endisset
</div>
@endsection

