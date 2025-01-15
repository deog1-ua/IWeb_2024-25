<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pago;

class WalletController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Obtener el saldo del usuario
        $walletBalance = $user->saldo ?? 0;  // Usamos un valor predeterminado si el saldo es nulo

        // Retornar la vista con el saldo y los pagos
        return view('wallet', compact('walletBalance'));
    }

    public function pagos()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();
        // Obtener los pagos del usuario
        $pagos = Pago::where('usuario_id', $user->id)->get();

        // Retornar la vista de pagos
        return view('pagos', compact('pagos'));
    }
}
