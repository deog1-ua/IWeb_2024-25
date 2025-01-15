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
            background-color: #b00000;
            color: white;
            padding: 15px 0;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
        }

        footer {
            width: 100%;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            padding: 15px 0;
            font-size: 0.9rem;
            margin-top: 20px;
        }

        .container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            gap: 40px; /* Aumentado el espacio entre los recuadros */
            margin-top: 50px;
            width: 100%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .wallet-container, .recharge-container {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1;
            min-height: 200px;
            margin-top: 20px; /* Agregado margen superior para más separación */
        }

        .wallet-balance {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .wallet-button {
            background-color: #b00000;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .wallet-button:hover {
            background-color: #800000;
        }

        label {
            font-size: 1.1rem;
            color: #555;
        }

        select {
            padding: 8px;
            font-size: 1rem;
            margin-left: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .recharge-button {
            background-color: #b00000;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .recharge-button:hover {
            background-color: #800000;
        }

        h1 {
            color: #b00000;
            text-align: center;
            margin-top: 20px;
            font-size: 2.5rem;
        }

        /* Cambié el tamaño y estilo del subtítulo */
        .title {
            color: #b00000;
            font-size: 1.3rem; /* Hizo más pequeño el subtítulo */
            font-weight: 600;
            margin-bottom: 30px; /* Aumentó el espacio debajo del subtítulo */
        }
    </style>
</head>

<header>
    Mi Wallet
</header>
<body>
    <div class="container">
        <div class="wallet-container">
            <div class="title">Mi saldo</div>
            <div class="wallet-balance">
                <?php
                // Obtenemos el saldo del usuario autenticado
                $user = Auth::user();
                $walletBalance = $user->saldo ?? 0; // Usamos un valor predeterminado si saldo es nulo
                echo number_format($walletBalance, 2) . ' €';
                ?>
            </div>
            <button class="wallet-button">Ver Pagos</button>
        </div>

        <div class="recharge-container">
            <div class="title">Recargas</div>
            <div class="recharge-amount">
                <label for="amount">Importe para recargar:</label>
                <select id="amount" name="amount">
                    <option value="10">10.00</option>
                    <option value="20.00">20.00</option>
                    <option value="30.00">30.00</option>
                    <option value="40.00">40.00</option>
                    <option value="50.00">50.00</option>
                    <option value="60.00">60.00</option>
                    <option value="70.00">70.00</option>
                    <option value="80.00">80.00</option>
                </select>
            </div>
            <button class="recharge-button">Recargar</button>
        </div>
    </div>
</body>
</html>
@endsection
