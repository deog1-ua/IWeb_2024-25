<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Master Trainer Studio') }}</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 120px; height: 40px;">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/actividades-publico">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Centros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/sobre-nosotros">Sobre Nosotros</a>
            </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Links de autentificación -->
            @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Iniciar sesión</a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link" href="/registro">Registro</a>
                    </li>  
            @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nombre }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @guest
                            @else
                                <a class="dropdown-item" href="/perfil" style="margin-bottom: 10px;">
                                    Mi Perfil
                                </a>   
                                @if (Auth::user()->tipo_usuario == "admin")
                                    <a class="dropdown-item" href="#" style="margin-bottom: 10px;">
                                        Usuarios
                                    </a>
                                    <a class="dropdown-item" href="#" style="margin-bottom: 10px;">
                                        Calendarios
                                    </a>
                                @endif
                            @endguest
                            
                            @if (Auth::user()->tipo_usuario == "monitor")
                                <a class="dropdown-item" href="#" style="margin-bottom: 10px;">
                                    Mi Calendario
                                </a>
                                <a class="dropdown-item" href="{{ route('actividades.index') }}" style="margin-bottom: 10px;">
                                    Mis Actividades
                                </a>
                            @endif

                            @if (Auth::user()->tipo_usuario == "socio")
                                <a class="dropdown-item" href="#" style="margin-bottom: 10px;">
                                    Mis reservas
                                </a>
                                <a class="dropdown-item" href="#" style="margin-bottom: 10px;">
                                    Mi Saldo
                                </a>
                            @endif
                            
                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    </nav>
        @yield('content')
    </div>
</body>
<footer class="container py-5">
  <div class="row">
    
    <div class="col-sm-6">
      <h5>© Gym Trainer Studio</h5>
      <ul class="list-unstyled text-small">
        <p class="text-secondary" style="width: 14rem;">
            ¡Suscríbete a Gym Trainer Studio hoy!
            Descubre un gimnasio que se adapta a ti con todo lo que necesitas para saber cómo puedes mejorar tu salud y bienestar.
        </p>
        
      </ul>
    </div>
    <div class="col-sm-6">
      <h5>About</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="/">Inicio</a></li>
        <li><a class="link-secondary" href="#">Servicios</a></li>
        <li><a class="link-secondary" href="#">Centros</a></li>
        <li><a class="link-secondary" href="#">Blog</a></li>
        <li><a class="link-secondary" href="#">Contacto</a></li>
        <li><a class="link-secondary" href="#">Sobre Nosotros</a></li>
        
      </ul>
    </div>
    <div class="col-sm-6">
      <ul class="list-unstyled text-small">
      <p class="text-secondary">
        © 2024 Gym Trainer Studio.  All rights reserved.
        Terms of Service   •   Privacy Policy
        </p>
      </ul>
    </div>
  </div>
</footer>
</html>