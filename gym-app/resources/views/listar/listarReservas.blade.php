@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="titulo1">Listado de Reservas</h1>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" id="error-alert" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    @if($reservas->isEmpty())
    <div style="margin-bottom:50px">
        <p class="text-center text-muted">No hay reservas disponibles.</p>
    </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    @if (Auth::user()->tipo_usuario == "admin")
                        <th>Usuario</th>
                    @endif
                    <th>Actividad</th>
                    <th>Fecha de realización</th>
                    <th>Turno</th>
                    <th>Lugar</th>
                    <th>Fecha de solicitud</th>
                    @if (Auth::user()->tipo_usuario == "socio")
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if (Auth::user()->tipo_usuario == "admin")
                            <td>{{ $reserva->user->nombre_usuario}}</td>
                        @endif
                        <td>{{ $reserva->horario->actividad->nombre }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->horario->fecha)->format('d/m/Y') }}</td>
                        <td>de {{ \Carbon\Carbon::parse($reserva->horario->hora_inicio)->format('H:i') }} a {{ \Carbon\Carbon::parse($reserva->horario->hora_fin)->format('H:i') }}</td>
                        <td>{{ $reserva->horario->sala->nombre }}</td>
                        <td>{{  \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</td>
                        @if (Auth::user()->tipo_usuario == "socio")
                            <td>
                                <a class="btn btn-danger btn-sm mt-1" href="{{ route('cancelar', $reserva->horario->id) }}">Cancelar</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
        
<script>
    // Función para ocultar las alertas después de 5 segundos
    setTimeout(function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');

        if (successAlert) {
            successAlert.style.display = 'none';
        }

        if (errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 5000); // 3000 milisegundos = 3 segundos
</script>
@endsection
