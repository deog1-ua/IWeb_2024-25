@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Wallet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            width: 100%;
            background-color: #b00000; /* Rojo */
            color: white;
            padding: 15px 0;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
        }

        .container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            gap: 40px;
            margin-top: 60px;
            width: 100%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .table {
            width: 80%; /* Ajustado el tamaño de la tabla */
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra suave */
            border-radius: 8px;
        }

        .table th,
        .table td {
            border: 1px solid #b00000; /* Líneas en rojo */
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: rgb(193, 38, 38); /* Fondo rojo para los encabezados */
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9; /* Alternancia de color en las filas */
        }

        .table tbody tr:hover {
            background-color: #f5f5f5; /* Color al pasar el cursor */
        }

        .table td {
            font-size: 1rem;
        }

        .back-button {
            margin-top: 20px;
            text-align: center;
        }

        .recharge-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #b00000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        .recharge-button:hover {
            background-color: #a00000;
        }


    </style>
</head>

<header>
    Mis Pagos
</header>

<body>
    <div class="container">

        @if($pagos->isEmpty())
            <p>No tienes pagos registrados.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagos as $pago)
                        <tr>
                            <td>{{ $pago->fecha }}</td>
                            <td>{{ number_format($pago->cantidad, 2) }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
<div class="back-button">
    <a href="{{ route('wallet') }}" class="recharge-button">Volver a Wallet</a>
</div>
</html>

@endsection
