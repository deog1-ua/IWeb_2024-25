<?php
namespace App\Http\Controllers;

use App\Services\TpvService;
use Illuminate\Http\Request;
use App\Models\User;

class PaymentController extends Controller
{
    protected $TpvService;

    public function __construct(TpvService $TpvService)
    {
        $this->TpvService = $TpvService;
    }

    public function recargar(Request $request)
    {
        // Validar el monto que envía el usuario
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $amount = $request->input('amount');
        $callbackUrl = route('wallet');
        $reference = 'MTS-' . uniqid(); // Generar referencia única

        // Llamar al service para crear el pago
        $response = $this->TpvService->createPayment($amount, 'EUR', 'Recarga de saldo MTS', $reference, $callbackUrl);

        if ($response['success']) {
            User::where('id', auth()->user()->id)->update(['saldo' => auth()->user()->saldo + $amount]);
            // Redirigir al usuario a la URL del TPV
            return redirect($response['url']);
        } else {
            // Manejo de errores
            return back()->withErrors('Error al procesar el pago: ' . $response['message']);
        }
    }

    public function callback(Request $request)
    {
        // Aquí manejas el callback
        return response()->json(['message' => 'Callback recibido correctamente']);
    }
}
