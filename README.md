# IWeb_2024-25
Proyecto grupo 10 – Gimnasio

## Despliegue
```bash
docker-compose up
```

Luego mirar variables de entorno `node` y de `php`
Sugerencia
`C:\Program Files\nodejs\`
`C:\xampp\php`


Instalar `composer` y añadir a variables de entorno

Después ejecutar en `gym-app`

```
composer global require laravel/installer
```

y 

```
composer install
```

```
npm i
```

y ejecutar dos terminales 

cambia el nombre del `.env`

- Terminal 1
```
npm run dev
```

- Terminal 2
```
php artisan serve
```

Ejecutar migraciones
```
php artisan migrate:fresh --seed
```

Poner imágenes:

copiar carpeta `images` de `public` a la carpeta `storage\public`

Después ejecutamos 
`php artisan storage:link`

```vite.config.js:
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0', // Escucha en todas las interfaces
        hmr: {
            host: '192.168.1.100', // Sustituye con la IP de tu máquina anfitriona
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});```



