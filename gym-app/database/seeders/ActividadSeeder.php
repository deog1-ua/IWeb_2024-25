<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $actividades = [
            [
                'nombre' => 'Zumba',
                'descripcion' => 'Zumba es una actividad física que combina baile y ejercicio aeróbico, creada por el bailarín y coreógrafo colombiano Alberto "Beto" Pérez en la década de los 90. Esta clase se caracteriza por su ritmo y estilo de baile, inspirado en música latina como salsa, merengue, reggaetón y cumbia, lo que la convierte en una experiencia divertida y energética. Ideal para quienes buscan una forma entretenida de mejorar su condición física, ya que no solo mejora la resistencia cardiovascular, sino que también tonifica y fortalece el cuerpo. Durante la sesión, los participantes siguen movimientos coreografiados que incluyen pasos rápidos y lentos, lo que ayuda a quemar calorías y mejorar la coordinación. Zumba es inclusiva y accesible para todas las edades y niveles de habilidad, y su ambiente de fiesta hace que sea más fácil mantenerse motivado durante todo el entrenamiento.',
                'imagen' => 'zumba.jpg',
                'importe' => 5.0,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Pilates',
                'descripcion' => 'Pilates es una disciplina física que se enfoca en mejorar la flexibilidad, la fuerza central y la postura a través de ejercicios controlados. Desarrollada por Joseph Pilates a principios del siglo XX, esta práctica está diseñada para fortalecer el core (músculos abdominales, espalda baja y caderas) y mejorar la estabilidad, el equilibrio y la alineación del cuerpo. A lo largo de una clase de Pilates, se utilizan movimientos lentos y controlados para trabajar los músculos de manera profunda, a diferencia de las actividades más dinámicas como el yoga o el spinning. Además, Pilates ayuda a reducir el estrés, mejorar la respiración y aumentar la conciencia corporal. Es ideal para personas de todas las edades que deseen mejorar su postura, flexibilidad y bienestar general.',
                'imagen' => 'pilates.jpg',
                'importe' => 7.5,
                'usuario_id' => 4,
            ],
            [
                'nombre' => 'Spinning',
                'descripcion' => 'El spinning es una forma de ciclismo indoor que se realiza en bicicletas estacionarias, guiado por un instructor que dirige la clase con música y diferentes rutinas de velocidad e intensidad. Durante una sesión de spinning, los participantes realizan ejercicios cardiovasculares que mejoran la resistencia y la fuerza de las piernas, mientras se queman una gran cantidad de calorías. Esta actividad está diseñada para ser de bajo impacto en las articulaciones, lo que la hace adecuada para personas de diferentes niveles de condición física. El spinning es conocido por ser un entrenamiento altamente efectivo que aumenta la capacidad aeróbica y mejora la salud del corazón, además de ser una excelente opción para quienes buscan perder peso o tonificar las piernas.',
                'imagen' => 'spinning.jpg',
                'importe' => 6.0,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Crossfit',
                'descripcion' => 'El Crossfit es un programa de entrenamiento físico de alta intensidad que combina elementos de levantamiento de pesas, gimnasia, atletismo y otros deportes. Se centra en la mejora de la fuerza, la resistencia, la agilidad, la potencia y la flexibilidad. Cada sesión de Crossfit está diseñada para ser desafiante y diversa, utilizando ejercicios funcionales que se pueden adaptar a todos los niveles de habilidad. Es conocido por su enfoque en la comunidad, con entrenamientos grupales que fomentan la camaradería y el espíritu de equipo. Crossfit es ideal para aquellos que buscan mejorar su estado físico general, aumentar la capacidad de trabajo en equipo y superar sus propios límites.',
                'imagen' => 'crossfit.jpg',
                'importe' => 10.0,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Yoga',
                'descripcion' => 'El yoga es una práctica ancestral originaria de la India que combina posturas físicas, técnicas de respiración y meditación para promover el bienestar físico, mental y espiritual. Se cree que el yoga ayuda a alcanzar un equilibrio entre el cuerpo y la mente, mejorando la flexibilidad, la fuerza, la concentración y la calma mental. Existen diferentes estilos de yoga, como el Hatha yoga, Vinyasa o Ashtanga, que varían en su enfoque y en la intensidad de las posturas. A lo largo de una clase de yoga, los participantes realizan una serie de asanas (posturas) que pueden incluir estiramientos, equilibrios y fortalecimiento muscular, mientras se enfoca en la respiración para mejorar la circulación y reducir el estrés. El yoga es adecuado para personas de todas las edades y niveles de habilidad, y es conocido por sus beneficios tanto físicos como emocionales.',
                'imagen' => 'yoga.jpg',
                'importe' => 8.0,
                'usuario_id' => 4,
            ],
            [
                'nombre' => 'Body Pump',
                'descripcion' => 'Body Pump es una clase de entrenamiento de fuerza que utiliza barras con pesas para trabajar todos los grupos musculares del cuerpo. Es una actividad de alta intensidad que se realiza al ritmo de la música, lo que hace que la clase sea dinámica y motivadora. Durante la sesión, los participantes realizan una serie de ejercicios centrados en el trabajo muscular, utilizando pesas que se ajustan según el nivel de cada persona. Body Pump es ideal para tonificar y fortalecer el cuerpo, mejorar la resistencia muscular y quemar calorías. Además, ayuda a aumentar la densidad ósea y a reducir el riesgo de lesiones, lo que lo convierte en un entrenamiento completo para aquellos que buscan mejorar su fuerza y figura.',
                'imagen' => 'bodypump.jpg',
                'importe' => 7.0,
                'usuario_id' => 4,
            ],
            [
                'nombre' => 'Body Combat',
                'descripcion' => 'Body Combat es una clase de entrenamiento cardiovascular que combina movimientos inspirados en artes marciales como el boxeo, el kickboxing, el karate y el taekwondo. Durante la clase, los participantes realizan una serie de ejercicios intensos que ayudan a mejorar la resistencia, la fuerza y la flexibilidad, mientras liberan tensiones y aumentan la confianza. A lo largo de la sesión, se trabaja la coordinación, la rapidez y el control del cuerpo, mientras se realiza una quema significativa de calorías. Body Combat es ideal para quienes buscan un entrenamiento divertido y desafiante que combine ejercicio físico con la liberación de estrés.',
                'imagen' => 'bodycombat.jpg',
                'importe' => 6.5,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Body Balance',
                'descripcion' => 'Body Balance es una clase que combina movimientos de yoga, pilates y tai chi para mejorar la flexibilidad, el equilibrio y la fuerza general del cuerpo. A través de ejercicios fluidos y controlados, se busca mejorar la postura y la relajación, mientras se estimula la mente y el cuerpo. El objetivo de Body Balance es lograr un estado de equilibrio físico y mental, ayudando a reducir el estrés y la ansiedad. Es una clase que se adapta a todos los niveles de habilidad, y está diseñada para proporcionar una experiencia de bienestar completa, ideal para quienes buscan una actividad suave pero efectiva.',
                'imagen' => 'bodybalance.jpg',
                'importe' => 7.5,
                'usuario_id' => 3,
            ],
            [
                'nombre' => 'Aerobic',
                'descripcion' => 'Aerobic es una actividad física que combina ejercicios cardiovasculares con movimientos rítmicos y coordinados al ritmo de la música. Generalmente se realiza en clases grupales, donde el instructor guía a los participantes a través de una serie de movimientos que incluyen saltos, giros y desplazamientos, lo que mejora la resistencia, la coordinación y la tonificación muscular. Aerobic es una excelente manera de quemar calorías, mejorar la circulación sanguínea y fortalecer el corazón. Además, debido a su naturaleza dinámica y energética, es una actividad divertida que motiva a las personas a mantenerse activas. Ideal para quienes buscan un entrenamiento de bajo impacto y divertido.',
                'imagen' => 'aerobic.jpg',
                'importe' => 5.5,
                'usuario_id' => 4,
            ],
            [
                'nombre' => 'Step',
                'descripcion' => 'El Step es un tipo de ejercicio aeróbico que se realiza con una plataforma elevada, conocida como step. Durante la clase, los participantes suben y bajan de la plataforma siguiendo una serie de movimientos coreografiados al ritmo de la música. Esta actividad trabaja principalmente las piernas, glúteos y el abdomen, mejorando la fuerza, la resistencia y la coordinación. Es ideal para quemar calorías, mejorar el sistema cardiovascular y tonificar la parte inferior del cuerpo. Aunque puede parecer sencillo, el step es un ejercicio efectivo y desafiante que se adapta a diferentes niveles de habilidad.',
                'imagen' => 'step.jpg',
                'importe' => 6.5,
                'usuario_id' => 4,
            ],
        ];
        

        DB::table('actividades')->insert($actividades);
        
    }
}
