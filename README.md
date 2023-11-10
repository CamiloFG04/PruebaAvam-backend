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
DB_DATABASE=tienda
DB_USERNAME=root
DB_PASSWORD=
```

También es necesario generar el APP_KEY
``` bash
php artisan key:generate
```

También es necesario generar un JWT_SECRET para poder realizar las peticiones
``` bash
php artisan jwt:secret
```


## Iniciar proyecto
Si se desea se puede crear solo la base de datos y correr el siguiente comando.
``` bash
php artisan migrate --seed (Para crear las tablas y subir los datos iniciales de las tablas)
```
Al hacerlo se crearan las tablas necesarias con sus respectivos datos de prueba, si no se quiere hacer este paso se puede usar el backup de la base de datos que se enviara por correo para restaurar la base de datos.


``` bash
php artisan serve (Para correr el proyecto de forma local)
```

## IMPORTANTE
- El proyecto debe estar corriendo en la dirección ip http://127.0.0.1 con puerto 8000, ya que el frontend esta apuntando a esa dirección para realizar las peticiones
- El nombre de la base de datos debe ser tienda


# PruebaAvam-backend

## Preguntas técnicas
A continuación se responderán las preguntas solicitadas

## ¿Qué medidas tomaría para asegurar la seguridad y la validación de datos en su aplicación?
- Uso de Autenticación y sistema de roles
- Uso de token para realizar consultas
- Validaciones desde el backend
- Uso del CSRF

## Explique la diferencia entre una base de datos relacional y una base de datos NoSQL. ¿Cuándo usaría uno u otro?

### Base de Datos Relacional
- Las bases de datos relacionales utilizan tablas con filas y columnas para almacenar datos.
- Debe seguir una estructura fija.
- Las bases de datos relacionales utilizan lenguajes SQL para realizar consultas y operaciones.
#### Cuando usarlo
- Cuando la estructura de los datos es clara y constante.
- Para aplicaciones donde la integridad y la consistencia de los datos son críticas, como sistemas financieros o sistemas de gestión de inventarios.
- Para aplicaciones donde las relaciones entre los datos son complejas y necesitan ser modeladas de manera precisa.

### Base de Datos NoSQL
- Las bases de datos NoSQL permiten modelos de datos flexibles, como documentos, columnas, gráficos o claves-valor.
- Las bases de datos NoSQL se escalan fácilmente, lo que las hace ideales para aplicaciones con grandes volúmenes de datos y alta concurrencia.
- Son adecuadas para aplicaciones que requieren un alto rendimiento y baja latencia, como aplicaciones web en tiempo real y sistemas de análisis de big data.
#### Cuando usarlo
- Para aplicaciones web y móviles de alto tráfico que necesitan escalabilidad.
- En escenarios donde la estructura de datos es variable o desconocida de antemano.
- Cuando la velocidad y el rendimiento son más críticos que la consistencia inmediata de los datos.

## Qué patrones de diseño conoce, mencione y explique brevemente los que conoce?
- MVC (Modelo Vista Controlador) usado bastante en el desarrollo con Laravel, donde se divide la lógica, las vistas y los modelos de la base de datos
- Adaptador, usado en Vuejs para integrar componentes que no son compatibles debido a sus interfaces

## ¿Cuáles son los métodos usados en la interfaz RESTful y explique cada uno?
- GET: Se utiliza para recuperar datos de un recurso específico sin modificarlo.
- POST: Se utiliza para crear un nuevo recurso en el servidor.
- PUT: Se utiliza para actualizar un recurso existente
- PATCH: Se utiliza para actualizar parcialmente un recurso
- DELETE: Se utiliza para eliminar un recurso existente.
