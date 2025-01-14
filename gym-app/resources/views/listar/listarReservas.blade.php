@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="titulo1">Listado de Reservas</h1>

    @if($reservas->isEmpty())
        <p>No hay reservas disponibles.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Actividad</th>
                    <th>Fecha de realización</th>
                    <th>Turno</th>
                    <th>Lugar</th>
                    <th>Fecha de solicitud</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reserva->user->nombre_usuario}}</td>
                        <td>{{ $reserva->horario->actividad->nombre }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->horario->fecha)->format('d/m/Y') }}</td>
                        <td>de {{ $reserva->horario->hora_inicio }} a {{$reserva->horario->hora_fin}}</td> 
                        <td>{{ $reserva->horario->sala }}</td>
                        <td>{{  \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
