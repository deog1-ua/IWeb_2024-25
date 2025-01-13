@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Reservas</h1>

    @if($reservas->isEmpty())
        <p>No hay reservas disponibles.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Actividad</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reserva->usuario->nombre }}</td>
                        <td>{{ $reserva->horario->actividad->nombre }}</td>
                        <td>{{ $reserva->fecha }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
