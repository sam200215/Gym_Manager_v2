<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## INICIALIZAR EL PROYECTO

### Instalar dependencias
Ejecuta el siguiente comando en la terminal para instalar las dependencias del proyecto:
```bash
composer install
```

### Copiar el archivo de entorno
Copia el archivo `.env.example` a `.env`:
```bash
cp .env.example .env
```

### Generar la clave de la aplicación
Ejecuta el siguiente comando para generar una nueva clave de aplicación:
```bash
php artisan key:generate
```

### Configurar el archivo .env
Abre el archivo `.env` y configura las variables de entorno según tu entorno de desarrollo, especialmente las relacionadas con la base de datos.

### Ejecutar migraciones
Ejecuta las migraciones para crear las tablas necesarias en la base de datos:
```bash
php artisan migrate
```

### Ejecutar el Seeder
```bash
php artisan db:seed
```

### Iniciar el servidor de desarrollo
Finalmente, inicia el servidor de desarrollo de Laravel:
```bash
php artisan serve
```
