@extends('layouts.app')

@section('content')
<div class="container-fluid p-0 mb-5">

    <!-- Sección de imagen con texto superpuesto -->
    <div class="position-relative hero-header">
        <img src="{{ asset('images/gym-banner.png') }}" class="d-block w-100 gym-banner" alt="Imagen del gimnasio">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center text-white text-center">
            <h1 class="display-4 fw-bold">Contáctanos</h1>
            <p class="lead">¿Tienes preguntas sobre nuestras clases o instalaciones? Llámanos, envíanos un mensaje o visítanos en uno de nuestros centros.</p>
        </div>
    </div>

</div>

<div class="container my-5">
    <div class="row">
        <!-- Contenido adicional de la página -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">Envíanos un mensaje</h4>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Escribe tu nombre">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Escribe tu email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Teléfono (opcional)</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Escribe tu teléfono">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Escribe aquí tu mensaje</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Tu mensaje..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
             <!-- Panel lateral -->
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Horarios de Atención al Cliente</h5>
                    <p class="card-text">Nuestro equipo de atención al cliente está disponible para ayudarte:</p>
                    <p><strong>+34 123 456 789</strong></p>
                    <p>Estamos disponibles de lunes a viernes, de 9:00 a 14:00.</p>
                    <p>Email: fitnessgym@company.com </p>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Preguntas frecuentes</h5>
                    <p class="card-text">Encuentra respuestas rápidas a tus dudas más comunes en esta sección.</p>
                    <a href="#" class="btn btn-danger">Ver más</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
