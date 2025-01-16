# IWeb_2024-25
Proyecto grupo 10 – Gimnasio

## Despliegue
```bash
docker-composer up
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

