# Proyecto EIMS

Generación de un ERP básico a medida que permita la gestión de Usuarios, Materiales y Proveedores.


***
## Objetivo:

- Autorización mediante login a usuarios registrados.
- Sistema básico de inventario.
- Administración de inventario para materiales.
- Administración de usuarios.
- Administración de proveedores.

### Requisitos de sistema:

- SO Linux
- Instalar Mysql 5.7
- Instalar Php 7.2
- Framework Laravel 5.5
- Navegador compatible


### Compilación y ejecución:

- Direccionar a carpeta EIMSl55 y ejecutar la serie de comandos:

- crear .env y nombrar credenciales de base de datos
https://github.com/laravel/laravel/blob/master/.env.example

- Crear base de datos 'eims' en MySql.

```bash
>create database eims;
```

- Instalar dependencias

```bash
$composer install
```

- Generar key para app

```bash
$php artisan key:generate
```

- Completar campos de direccionamiento a MySQL

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<database_name>
DB_USERNAME=<MySQL_user>
DB_PASSWORD=<MySQL_password>
```

- Corroborar que en archivo EIMSl55/config/database.php se encuentre:

    - Configuración en "Default Database Connection Name"
    ```bash
    'default' => env('DB_CONNECTION', 'mysql')
    ```

    - Configuración en "Database Connections"
    ```bash
    'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    ```



- Generar Migraciones: Estructura de Base de Datos

```bash
$php artisan migrate
```

- Generar Datos

```bash
$php artisan db:seed
```

- Ejecutar

```bash
$php artisan serve
```

### Observaciones

- Software se encuentra en proceso de actualización y migraciones.

- Software desarrollado para propósito de presentación funcional.
