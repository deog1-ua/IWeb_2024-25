<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TpvService
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('TPV_API_KEY'); // API Key desde el .env
        $this->apiUrl = 'https://api.green-sys.es/sales'; // URL base de la API
    }

    /**
     * Crear un pago y obtener la URL del TPV
     *
     * @param float $amount
     * @param string $currency
     * @param string $description
     * @param string $reference
     * @param string $callbackUrl
     * @return array
     */
    public function createPayment(float $amount, string $currency, string $description, string $reference, string $callbackUrl)
    {
        $data = [
            'amount' => $amount,
            'currency' => $currency,
            'description' => $description,
            'reference' => $reference,
            'url_callback' => $callbackUrl,
        ];

        // Realizar la petición a la API
        $response = Http::withHeaders([
            'x-api-key' => $this->apiKey,
        ])->post($this->apiUrl, $data);

        // Manejo de respuesta
        if ($response->status() === 201) {
            return ['success' => true, 'url' => $response->json('url')];
        }

        // Si ocurre un error, retornar la información relevante
        return [
            'success' => false,
            'error' => $response->status(),
            'message' => $response->json('message') ?? 'Ocurrió un error inesperado.',
        ];
    }
}
