@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrado de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .navbar {
            display: flex;
            justify-content: space-between; /* Alinea los elementos de la barra de navegación */
            align-items: center;
            margin-bottom: 20px;
        }
        .navbar button {
            background-color: #a52a2a;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
        .navbar button:hover {
            background-color: #8b0000;
        }
        .search-bar {
            display: flex;
            align-items: center;
            width: 60%; /* Ajustamos el ancho de la barra de búsqueda */
        }
        .search-bar input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            flex-grow: 1;
            font-size: 16px;
        }
        .search-bar button {
            padding: 10px 20px;
            background-color: #a52a2a;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }
        .search-bar button:hover {
            background-color: #8b0000;
        }
        .user-list {
            margin-top: 20px;
        }
        .user-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .user-item img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .user-details {
            flex-grow: 1;
            color: black;
        }
        .block-button {
            background-color: #a52a2a;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .block-button:hover {
            background-color: #8b0000;
        }
        .reject-button {
            background-color: gray;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .reject-button:hover {
            background-color: darkgray;
        }
        .blocked {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

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
    @isset($usuarios) <!-- Mostrar solo si estamos en la vista de usuarios activos -->
        <h2>Usuarios Activos</h2>
        <div class="user-list">
            @foreach($usuarios as $usuario)
            <div class="user-item">
                <img src="/path/to/image" alt="User Photo">
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
            </div>
            @endforeach
        </div>
    @endisset

    @isset($pendientes) <!-- Mostrar solo si estamos en la vista de usuarios pendientes -->
        <h2>Usuarios Pendientes</h2>
        <div class="user-list">
            @foreach($pendientes as $pendiente)
            <div class="user-item">
                <img src="/path/to/image" alt="User Photo">
                <div class="user-details">
                    <strong>{{ $pendiente->nombre }} {{ $pendiente->apellidos }}</strong><br>
                    <span>{{ $pendiente->email }}</span><br>
                    <span>{{ $pendiente->telefono }}</span>
                </div>
                <form action="{{ route('usuarios.aprobar', $pendiente->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="block-button" type="submit">Aprobar</button>
                </form>
                <form action="{{ route('usuarios.rechazar', $pendiente->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="reject-button" type="submit">Rechazar</button>
                </form>
            </div>
            @endforeach
        </div>
    @endisset
</div>

@endsection
</body>
</html>
