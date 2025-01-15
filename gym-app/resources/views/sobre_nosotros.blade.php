@extends('layouts.app')


@section('content')
    <div class="container">
        <h1 class="titulo1">Sobre Nosotros</h1>
        <div class="imagen-fondo" style="background: url('{{ asset('images/gg.png') }}');">
            <h2>¡Conoce a Nuestro Equipo y Nuestra Misión!</h2>
            <p>Inspirando Bienestar y Transformación Cada Día</p>
        </div>
        <div class="contenido">
            <h3 class="sobre-nosotros">Sobre nosotros</h3>
            <div class="izquierda">
                <div>
                    <p class="parrafo1">
                        En Fitness Gym, creemos que la actividad física es el camino hacia una vida 
                        equilibrada y saludable. Nuestro objetivo es acompañarte en cada paso de tu 
                        transformación física y mental, ofreciéndote un ambiente motivador, moderno y 
                        seguro donde puedas desafiar tus límites. 
                    </p>
                </div>
                <div>
                    <p class="parrafo1">
                        Estamos comprometidos con tu progreso y bienestar. 
                        Desde el primer día, nuestro equipo se enfoca en escuchar tus 
                        objetivos y crear un plan personalizado que te permita alcanzar 
                        el éxito de manera sostenible. Nos esforzamos por ofrecerte un ambiente de apoyo
                        y superación constante, donde puedas sentirte cómodo y respaldado en cada sesión.
                    </p>
                </div>
            </div>
            <div class="derecha">
                <div>
                    <p class="parrafo1">
                        Contamos con un equipo de profesionales experimentados y apasionados, 
                        que están aquí para guiarte, motivarte y ayudarte a alcanzar tus metas,
                        ya sea mejorar tu condición física, ganar fuerza o simplemente sentirte mejor.
                    </p>
                </div>
                <div>
                    <p class="parrafo1">
                        Cada uno de nuestros entrenadores aporta un enfoque único y especializado, 
                        asegurando que, sin importar tu nivel o tus objetivos, siempre encuentres el apoyo
                        que necesitas. Te invitamos a conocer más sobre nuestro equipo y descubrir cómo pueden ayudarte a 
                        construir una mejor versión de ti mismo.
                    </p>
                </div>
            </div>
        </div>

        <div>
            <hr>
            <div class="mision">
                <h3 class="sobre-nosotros">¿Como inscribirme?</h3>
                <p class="parrafo2"> 
                    Matricúlate y comienza tu camino hacia una vida más saludable. Seguir estos simples pasos te permitirá
                    acceder a nuestros centros y disfrutar de todas nuestras instalaciones y clases.
                </p>
                <div class="step-container">
                    <div class="step">
                        <div class="circle">1</div>
                        <div class="line"></div>
                        <div class="step-text">
                            <h4 class="step-title">Rellena el Formulario de Inscripción</h4>
                            <p class="step-texto">
                                Completa el formulario en nuestra recepción o en línea con tus datos personales y elige el plan que mejor se adapte a tus necesidades.
                            </p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="circle">2</div>
                        <div class="line"></div>
                        <div class="step-texto">
                            <h4 class="step-title">Realiza el Pago de Matrícula</h4>
                            <p class="step-text">
                                Abona la matrícula inicial para activar tu membresía. Este pago es único y asegura tu acceso a todas las instalaciones del gimnasio.
                            </p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="circle">3</div>
                        <div class="line"></div>
                        <div class="step-texto">
                            <h4 class="step-title">Activa tu Cuota Mensual</h4>
                            <p class="step-text">
                                Selecciona tu método de pago preferido para tu cuota mensual, y ¡listo! Ahora tienes acceso completo a nuestros centros, clases y beneficios.
                            </p>
                        </div>
                    </div>
                </div> 
            </div> 

            <div style="text-align: center;margin-bottom:60px;margin-top:40px;">
                <a href="/registro" class="btn btn-lg design-button-a">Inscribirme ahora</a>
            </div>
        </div>
        <div>
            <hr>
            <div>
                <h3 class="sobre-nosotros">Conoce a nuestros entrenadores</h3>
                <p class="parrafo2">¡Comienza hoy y transforma tu vida con nosotros!</p>
                <div class="row">
                    <div class="col-md-4 tarjeta">
                        <div class="text-center">
                            <img src="{{ asset('images/trainer1.png') }}" alt="trainer1" class="imagen-entrenador img-fluid">
                        </div>
                        <div class="text-trainer">
                            <p>
                                Con una carrera que abarca casi una década. Cada sesión es una combinación
                                de fuerza, resistencia y ritmo. Lidia sabe cómo motivar a sus alumnos, 
                                y sus clases son perfectas para aquellos que buscan mejorar su resistencia y disfrutar de un 
                                entrenamiento.
                            </p>
                            <div class="abajo">
                                <h4>Lidia López</h4>
                                <p>Entrenador Personal</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 tarjeta">
                        <div class="text-center">
                            <img src="{{ asset('images/trainer2.png') }}" alt="trainer2" class="imagen-entrenador img-fluid">
                        </div>
                        <div class="text-trainer">
                            <p>Con más de 5 años de experiencia en el mundo del fitness, Carolina es una apasionada del Pilates y la 
                                meditación. Sus clases son una combinación de fuerza, equilibrio y flexibilidad, y están diseñadas para 
                                ayudarte a mejorar tu postura y bienestar. El Pilates es una forma de conectar con tu cuerpo.
                            </p>
                            <div class="abajo">
                                <h4>Carolina Mendez</h4>
                                <p>Entrenadora de Pilates</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 tarjeta">
                        <div class="text-center">
                            <img src="{{ asset('images/trainer3.png') }}" alt="trainer3" class="imagen-entrenador img-fluid">
                        </div>
                        <div class="text-trainer">
                            <p>Michael es un apasionado del ciclismo y la resistencia. Con más de 7 años de experiencia en el mundo del spinning, 
                                sus clases son una combinación de intensidad, resistencia y motivación. Perfectas para aquellos que buscan mejorar su
                                resistencia cardiovascular y quemar calorías.
                            </p>
                            <div class="abajo">
                                <h4>Michael Smith</h4>
                                <p>Entrenador de Spinning</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <hr>
            <div class="preguntas">
                <h3 class="sobre-nosotros">Preguntas Frecuentes</h3>
                <p class="parrafo2">
                    ¿Tienes alguna pregunta? ¡Aquí tienes algunas respuestas a las preguntas más frecuentes!
                </p>
            </div>
            <div style="margin-bottom: 100px;">
                <div  class="container mt-4">
                    <div class="accordion" id="accordionExample">
                        <!-- First Item -->
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <span class="toggle-icon">+</span>
                                    ¿Cuáles son los horarios de apertura?
                                </button>
                            </h4>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Nuestros centros están abiertos de lunes a viernes de 6:00 a 22:00, y los sábados y domingos de 8:00 a 20:00.
                                </div>
                            </div>
                        </div>

                        <!-- Second Item -->
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="toggle-icon">+</span>
                                    ¿Ofrecen clases grupales?
                                </button>
                            </h4>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Sí, ofrecemos una amplia variedad de clases grupales, incluyendo Pilates, Spinning, HIIT y Zumba.
                                </div>
                            </div>
                        </div>

                        <!-- Third Item -->
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="toggle-icon">+</span>
                                    ¿Puedo cancelar mi membresía en cualquier momento?
                                </button>
                            </h4>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Sí, puedes cancelar tu membresía en cualquier momento. Sin embargo, te recomendamos que hables con nuestro equipo antes de tomar una decisión para que podamos encontrar la mejor solución para ti.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.accordion-button').forEach(button => {
            button.addEventListener('click', () => {
                const icon = button.querySelector('.toggle-icon');
                if (button.classList.contains('collapsed')) {
                    icon.textContent = '+';
                } else {
                    icon.textContent = '-';
                }
            });
        });
    </script>

@endsection