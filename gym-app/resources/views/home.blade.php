@extends('layouts.app')

@section('content')
<div>
    @if(session('message'))
        <div class="alert alert-success text-success text-success-emphasis alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner mb-5">
            <div class="carousel-item active hero-header">
                <img class="d-block w-100" src="{{ asset('images/portada1.jpg') }}" alt="portada1">
                <div class="container">
                    <div class="carousel-caption text-center">
                        <h1>Transforma tu Cuerpo y tu mente</h1>
                        <p class="leads">Alcanza tus objetivos con nuestro equipo de expertos, instalaciones de primera y una comunidad que te apoya.</p>
                        <p><a class="btn btn-lg btn-danger" href="/registro">HACERME SOCIO</a></p>
                    </div>
                </div>
            </div>

        <div class="carousel-item hero-header" style="text-align: right;">
            <img class="d-block w-100" src="{{ asset('images/portada4.jpg') }}" alt="portada2">

            <div class="container">
            <div class="carousel-caption text-start">
                <h1>Actividades</h1>
                <p>Encuentra tu actividad ideal para empezar un nuevo reto.</p>
                <p><a class="btn btn-lg btn-danger" href="/actividades-publico">Ver Actividades</a></p>
            </div>
            </div>
        </div>
        <div class="carousel-item hero-header">
        <img class="d-block w-100" src="{{ asset('images/portada3.png') }}" alt="portada3">

            <div class="container">
            <div class="carousel-caption text-end">
                <h1>CENTROS DISPONIBLES</h1>
                <p>Conoce todos nuestros centros más cerca de ti.</p>
                <p><a class="btn btn-lg btn-danger" href="/centros">Ver Centros</a></p>
            </div>
            </div>
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-2 text-center container">
        <h2 style="text-align: left" >Algunos de nuestros servicios...</h2>
        <div class="row justify-content-center py-lg-5 g-4">
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/crossfit.jpg') }}" alt="act1">
                    <div class="card-body">
                        <h5 class="card-title">Crossfit</h5>
                        <p class="card-text">Entrenamiento de alta intensidad que combina ejercicios de varias disciplinas, como levantamiento de pesas, etc.</p>
                        <a href="/actividades/publico/4" class="btn btn-danger">Saber más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/zumba.jpg') }}" alt="act1">
                    <div class="card-body">
                        <h5 class="card-title">Zumba</h5>
                        <p class="card-text">Actividad dinámica que combina baile y ejercicio al ritmo de música latina para quemar calorías mientras te diviertes.</p>
                        <a href="/actividades/publico/1" class="btn btn-danger">Saber más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/pilates.jpg') }}" alt="act1">
                    <div class="card-body">
                        <h5 class="card-title">Pilates</h5>
                        <p class="card-text">Entrenamiento que fortalece el cuerpo, mejora la postura y aumenta la flexibilidad a través de movimientos controlados.</p>
                        <a href="/actividades/publico/2" class="btn btn-danger">Saber más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/spinning.jpg') }}" alt="act1">
                    <div class="card-body">
                        <h5 class="card-title">Spinning</h5>
                        <p class="card-text">Clase de ciclismo indoor de alta intensidad que mejora la resistencia cardiovascular y quema calorías. Resistencia, intensidad, cardio, motivación.</p>
                        <a href="/actividades/publico/3" class="btn btn-danger">Saber más</a>
                    </div>
                </div>
            </div>
            <div class="">
                <a class="btn btn-danger design-button-a" href="/actividades-publico">Ver más</a>
            </div>
        </div>
    </div>

    <div class="prices container">
        <h2 class="text-left">TARIFAS DE PRECIOS</h2>
        <div class="title-prices" style="background: url('{{ asset('images/portada3.png') }}'); background-attachment: fixed">
            <h2>Elige el plan que mejor se adapte a ti.</h2>
        </div>

        <div class="row mt-5">
            <div class="col-md-4" >
                <div class="card">
                    <div class="card-header basic text-center" >
                        <h3>PLAN BÁSICO</h3>
                    </div>
                    <div class="leads card-body">
                        <p class="precio-item text-center">€25<span>/mensual</span></p>
                        <ul class="list">
                            <li>Acceso completo a las instalaciones</li>
                            <li>2 clases grupales al mes(a elegir entre pilates, spinning, o HIIT)</li>
                            <li>Evaluación física inicial con un profesional</li>
                            <li>Wi-Fi gratuito en las instalaciones</li>
                        </ul>

                        <div class="d-grid gap-2">
                            @guest
                                <a href="/login" class="btn btn-dark btn-lg card-basic">Elegir plan</a>
                            @else
                                <a href="#" class="btn btn-dark btn-lg card-basic">Elegir plan</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" >
                <div class="card">
                    <div class="card-header standard text-center" >
                        <h3>PLAN PLUS</h3>
                    </div>
                    <div class="leads card-body">
                        <p class="precio-item text-center">€35<span>/mensual</span></p>
                        <ul class="list">
                            <li>PLAN BÁSICO</li>
                            <li>Clases grupales ilimitadas (a excepción de las acuáticas)</li>
                            <li>Evaluación física inicial y seguimiento mensual</li>
                            <li>Uso de taquillas y duchas</li>
                        </ul>

                        <div class="d-grid gap-2">
                            @guest
                                <a href="/login" class="btn btn-dark btn-lg card-standard">Elegir plan</a>
                            @else
                                <a href="#" class="btn btn-dark btn-lg card-standard">Elegir plan</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" >
                <div class="card">
                    <div class="card-header premium text-center" >
                        <h3>PLAN PREMIUM</h3>
                    </div>
                    <div class="leads card-body">
                        <p class="precio-item text-center">€45<span>/mensual</span></p>
                        <ul class="list">
                            <li>PLAN PLUS</li>
                            <li>Clases grupales ilimitadas</li>
                            <li>1 sesión de entrenamiento personalizado al mes</li>
                            <li>Asesoría nutricional básica y plan de alimentación mensual</li>
                        </ul>

                        <div class="d-grid gap-2">
                            @guest
                                <a href="/login" class="btn btn-dark btn-lg card-premium">Elegir plan</a>
                            @else
                                <a href="#" class="btn btn-dark btn-lg card-premium">Elegir plan</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        
    </div>
    
</div>
@endsection