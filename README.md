# CRUD de Tareas — Laravel + PostgreSQL

Aplicación básica de gestión de tareas (crear, listar, ver, editar, eliminar)
con Laravel 13 y PostgreSQL.

## Requisitos

- PHP >= 8.3 con extensiones `pgsql` y `pdo_pgsql`
- Composer 2.x
- PostgreSQL 14+ con cliente `psql`

## Instalación

```sh
composer install
cp .env.example .env
php artisan key:generate
```

## Base de datos

Crear base y usuario (una sola vez):

```sql
CREATE DATABASE laravel_crud_tareas;
CREATE USER laravel_user WITH PASSWORD 'tu-password';
ALTER DATABASE laravel_crud_tareas OWNER TO laravel_user;
```

Configurar en `.env`:

```ini
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel_crud_tareas
DB_USERNAME=laravel_user
DB_PASSWORD=tu-password
```

Migrar:

```sh
php artisan migrate
```

## Uso

```sh
php artisan serve
```

Abrir <http://localhost:8000> (redirige a `/tareas`).

## Rutas

Recurso `tareas` (`routes/web.php`): `index`, `create`, `store`,
`show`, `edit`, `update`, `destroy` → `TareaController`.

```sh
php artisan route:list --name=tareas
```

## Estructura

```text
app/Models/Tarea.php                  # fillable: titulo, descripcion, completada
app/Http/Controllers/TareaController.php  # lógica CRUD + validación
database/migrations/*_create_tareas_table.php
resources/views/layouts/app.blade.php # layout base
resources/views/tareas/               # index, create, show, edit
```
