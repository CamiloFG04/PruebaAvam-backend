<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Requerimientos
Paras iniciar el proyecto se requiere tener instalado composer, php 8.1 y algún gestor de base de datos mySQL

## Instalar dependencias
``` bash
composer install
```

## Configuración del .env
Se necesita agregar esta configuración para las variables para la base de datos
``` bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=innclod
DB_USERNAME=root
DB_PASSWORD=
```
También es necesario generar un JWT_SECRET para poder realizar las peticiones
``` bash
php artisan jwt:secret
```


## Iniciar proyecto
``` bash
php artisan migrate --seed (Para crear las tablas y subir los datos iniciales de las tablas)
```
``` bash
php artisan serve (Para correr el proyecto de forma local)
```

## IMPORTANTE
- El proyecto debe estar corriendo en la dirección ip http://127.0.0.1 con puerto 8000, ya que el frontend esta apuntando a esa dirección para realizar las peticiones
- El nombre de la base de datos debe ser innclod
- Solo se necesita crear la base de datos, las tablas y datos iniciales se crearan al correr el comando
``` bash
php artisan serve --seed
```


