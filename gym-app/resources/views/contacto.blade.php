@extends('layouts.app')

@section('content')
<div class="container-fluid p-0 mb-5">

    <!-- Sección de imagen con texto superpuesto -->
    <div class="position-relative hero-header">
        <img src="{{ asset('images/gym-banner.png') }}" class="d-block w-100 gym-banner" alt="Imagen del gimnasio">
        <div class="carousel-caption text-white text-center">
            <h1 class="display-4 fw-bold">Contáctanos</h1>
            <p class="lead">¿Tienes preguntas sobre nuestras clases o instalaciones? Llámanos, envíanos un mensaje o visítanos en uno de nuestros centros.</p>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <!-- Panel lateral -->
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title"><strong>Horarios de Atención al Cliente</strong></h5>
                    <p class="card-text">Nuestro equipo de atención al cliente está disponible para ayudarte:</p>
                    <p><strong>+34 123 456 789</strong></p>
                    <p>Estamos disponibles de lunes a viernes, de 9:00 a 14:00.</p>
                    <p>Email: aas141@gcloud.ua.es </p>
                </div>
            </div>
        </div>
        <!-- Panel lateral -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><strong>Preguntas frecuentes</strong></h5>
                    <p class="card-text">Encuentra respuestas rápidas a tus dudas más comunes en esta sección.</p>
                    <a href="/sobre-nosotros" class="btn btn-danger">Ver más</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
