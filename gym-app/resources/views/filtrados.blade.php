
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
            align-items: center;
            margin-bottom: 20px;
        }
        .navbar button {
            background-color: #a52a2a;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .navbar button:hover {
            background-color: #8b0000;
        }
        .search-bar {
            flex-grow: 1;
        }
        .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
    </style>
</head>
<body>

<div class="navbar">
    <button onclick="showUsers()">Usuarios</button>
    <button onclick="showPending()">Pendientes</button>
    <div class="search-bar">
        <input type="text" placeholder="Buscar...">
    </div>
</div>

<div id="content">
    <h2>Listado de usuarios</h2>
    <div class="user-list">
        @foreach($usuarios as $usuario)
        <div class="user-item">
            <img src="/path/to/image" alt="User Photo">
            <div class="user-details">
                <strong>{{ $usuario->nombre }} {{ $usuario->apellidos }}</strong><br>
                <span>{{ $usuario->email }}</span><br>
                <span>{{ $usuario->telefono }}</span>
            </div>
                        @if($usuario->tipo_usuario == 'socio') <!-- Verifica si el usuario es un socio -->
                        <form action="{{ route('usuarios.bloquear', $usuario->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="block-button" type="submit">Bloquear</button>
                        </form>
                        @endif
                    </div>
        @endforeach
    </div>
</div>

<script>
    function showUsers() {
        document.getElementById('content').innerHTML = `
            <h2>Listado de usuarios</h2>
            <div class="user-list">
                @foreach($usuarios as $usuario)
                <div class="user-item">
                    <img src="/path/to/image" alt="User Photo">
                    <div class="user-details">
                        <strong>{{ $usuario->nombre }} {{ $usuario->apellidos }}</strong><br>
                        <span>{{ $usuario->email }}</span><br>
                        <span>{{ $usuario->telefono }}</span>
                    </div>
                        @if($usuario->tipo_usuario == 'socio') <!-- Verifica si el usuario es un socio -->
                        <form action="{{ route('usuarios.bloquear', $usuario->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="block-button" type="submit">Bloquear</button>
                        </form>
                        @endif
                    </div>
                @endforeach
            </div>
        `;
    }

    function showPending() {
        document.getElementById('content').innerHTML = `
            <h2>Usuarios pendientes</h2>
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

                    <!-- Botón de Rechazo -->
                    <form action="{{ route('usuarios.rechazar', $pendiente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE') <!-- Usamos DELETE para eliminar al usuario -->
                        <button class="reject-button" type="submit">Rechazar</button>
                    </form>
                </div>
                @endforeach
            </div>
        `;
    }
</script>

</body>
</html>
@endsection
