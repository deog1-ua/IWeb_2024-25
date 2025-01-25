@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h3 class="text-center mb-4 color-rojo">Reservas para la Actividad: {{ $actividad->nombre }}</h3>

    @if($usuarios->isEmpty())
        <p class="text-center text-muted">No hay reservas para esta actividad.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellidos }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->telefono }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mt-4 text-center actividad-estilos">
        <a href="/mis-actividades/{{ $actividad->id }}" class="btn a-volver">
             Volver a la Actividad
        </a>
    </div>
</div>
@endsection
