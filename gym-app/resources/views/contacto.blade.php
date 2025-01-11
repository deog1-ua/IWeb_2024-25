@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Contáctanos</h1>
    <p class="text-center">¿Tienes preguntas sobre nuestras clases o instalaciones? Llámanos, envíanos un mensaje o visítanos en uno de nuestros centros.</p>

    <div class="row">
        <!-- Formulario de contacto -->
        <div class="col-md-6">
            <h4>Envíanos un mensaje</h4>
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Tu nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Tu correo electrónico" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono (opcional)</label>
                    <input type="text" class="form-control" id="telefono" placeholder="Tu número de teléfono">
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Escribe aquí tu mensaje</label>
                    <textarea class="form-control" id="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                </div>
                <!-- Simulación de reCAPTCHA -->
                <div class="mb-3">
                    <input type="checkbox" id="recaptcha" required>
                    <label for="recaptcha">No soy un robot</label>
                </div>
                <button type="submit" class="btn btn-danger">Enviar</button>
            </form>
        </div>

        <!-- Información adicional -->
        <div class="col-md-6">
            <h4>Horarios de Atención al Cliente</h4>
            <p>
                Nuestro equipo de atención al cliente está disponible para ayudarte:
            </p>
            <p><strong>Teléfono:</strong> +34 123 456 789</p>
            <p><strong>Horario:</strong> Lunes a viernes, de 9:00 a 14:00.</p>
            <p><strong>Email:</strong> fitnessgym@company.com</p>

            <h4>Preguntas frecuentes</h4>
            <p>Encuentra respuestas rápidas a tus dudas más comunes en esta sección.</p>
            <a href="#" class="btn btn-outline-danger">Ver más</a>
        </div>
    </div>
</div>
@endsection
