@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <title>Centros Disponibles</title>
</head>

<body>
    <!-- Sección principal -->
    <header class="title-section text-center" style="background-image: url('{{ asset('images/centros.png') }}');">
        <h1>Descubre Nuestros Centros Cerca de Ti</h1>
    </header>

    <div class="container my-5">
        <!-- Información general -->
        <div class="row mb-4">
            <!-- Descripción -->
            <div class="col-md-6">
                <div class="info-box p-4">
                    <h3>Un Gimnasio en Cada Punto de la Ciudad</h3>
                    <p>Ya sea que busques comodidad, modernidad o cercanía, tenemos un centro pensado para ti. Con instalaciones de última generación y entrenadores certificados, nuestros gimnasios te ofrecen la mejor experiencia fitness.</p>
                </div>
            </div>
            <!-- Botón de contacto -->
            <div class="col-md-6 a-contacto">
                <div class="info-box p-4 text-center">
                    <h3>Contáctanos</h3>
                    <p>Ponte en contacto con nosotros y resuelve cualquier duda.</p>
                    <a href="/contacto" class="btn">Contáctanos</a>
                </div>
            </div>
        </div>

        <!-- Detalles del centro -->
        <div class="location-section mb-5">
            <div class="location-card p-3">
                <h3>Master Trainer Studio</h3>
                <div class="row align-items-center">
                    <!-- Iconos y detalles -->
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li><i class="fas fa-clock"></i> Lunes a viernes: 07:00 a 23:00</li>
                            <li><i class="fas fa-clock"></i> Sábados: 9:00 a 15:00 y 18:00 a 21:00</li>
                            <li><i class="fas fa-clock"></i> Domingos y festivos: 9:00 a 15:00</li>
                            <li><i class="fas fa-map-marker-alt"></i> Calle Serrano Jover, 3, 03001 Alicante</li>
                            <li><i class="fas fa-envelope"></i> fmpp3@gcloud.ua.es</li>
                            <li><i class="fas fa-phone"></i> +1-617-555-0108</li>
                        </ul>
                    </div>
                    <!-- Mapa -->
                    <div class="col-md-6">
                        <div id="map1" class="map"></div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Centros disponibles -->
        <h3 class="text-danger">Centros Disponibles</h3>
        <div class="row g-4">
            <!-- Primer centro -->
            <div class="col-md-6">
                <div class="location-card p-3">
                    <div id="map2" class="map mb-3"></div>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt"></i> Calle Alameda, 123, 03001 Alicante</li>
                        <li><i class="fas fa-envelope"></i> deog1@gcloud.ua.es</li>
                        <li><i class="fas fa-phone"></i> +1-632-960985</li>
                        <li><i class="fas fa-clock"></i> Lunes a viernes: 07:00 a 23:00</li>
                        <li><i class="fas fa-clock"></i> Sábados: 9:00 a 15:00 y 18:00 a 21:00</li>
                        <li><i class="fas fa-clock"></i> Domingos y festivos: 9:00 a 15:00</li>
                    </ul>
                </div>
            </div>
            <!-- Segundo centro -->
            <div class="col-md-6">
                <div class="location-card p-3">
                    <div id="map3" class="map mb-3"></div>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt"></i> Calle Benetussen, 13, 03001 Alicante</li>
                        <li><i class="fas fa-envelope"></i> jse22@gcloud.ua.es</li>
                        <li><i class="fas fa-phone"></i> +1-632-960985</li>
                        <li><i class="fas fa-clock"></i> Lunes a viernes: 07:00 a 23:00</li>
                        <li><i class="fas fa-clock"></i> Sábados: 9:00 a 15:00 y 18:00 a 21:00</li>
                        <li><i class="fas fa-clock"></i> Domingos y festivos: 9:00 a 15:00</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Inicializar mapas
        const map1 = L.map('map1').setView([38.3452, -0.4815], 15); // Coordenadas de Alicante
        const map2 = L.map('map2').setView([38.3452, -0.4815], 15);
        const map3 = L.map('map3').setView([38.3452, -0.4815], 15);

        // Añadir capas de mapas
        const tileLayer = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        const attribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

        L.tileLayer(tileLayer, { attribution }).addTo(map1);
        L.tileLayer(tileLayer, { attribution }).addTo(map2);
        L.tileLayer(tileLayer, { attribution }).addTo(map3);
    </script>
</body>

</html>

@endsection