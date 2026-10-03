<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Gestor de Tareas')</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, Helvetica, sans-serif; max-width: 760px; margin: 40px auto; padding: 0 16px; color: #1c2333; background: #fff; }
        header.top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }
        header.top h1 { margin: 0; font-size: 1.6rem; color: #1a3a5f; }
        header.top h1 a { color: inherit; text-decoration: none; }
        nav a { color: #0e7c6b; text-decoration: none; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        .mensaje { background: #e9faf1; border-left: 4px solid #0e7c6b; padding: 10px 12px; border-radius: 4px; margin: 16px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; vertical-align: top; }
        th { background: #f2f4f7; }
        .badge { display: inline-block; padding: 2px 8px; border-radius: 10px; font-size: 0.85rem; font-weight: bold; }
        .badge-si { background: #e9faf1; color: #0e7c6b; }
        .badge-no { background: #f2f4f7; color: #555; }
        .acciones { white-space: nowrap; }
        .acciones a, .acciones button { margin-right: 6px; }
        .btn { display: inline-block; padding: 8px 14px; border-radius: 4px; text-decoration: none; font-weight: bold; border: 1px solid transparent; cursor: pointer; font-size: 0.95rem; background: #f2f4f7; color: #1a3a5f; }
        .btn:hover { filter: brightness(0.96); }
        .btn-crear, .btn-guardar { background: #1a3a5f; color: #fff; }
        .btn-peligro { background: #fff; color: #b42318; border-color: #b42318; }
        form.inline { display: inline; }
        .campo { margin-bottom: 14px; }
        .campo label { display: block; font-weight: bold; margin-bottom: 4px; }
        .campo input[type="text"], .campo textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font: inherit; }
        .campo textarea { min-height: 90px; resize: vertical; }
        .error { color: #b42318; font-size: 0.9rem; margin-top: 4px; }
        .check { display: flex; align-items: center; gap: 8px; }
        .detalle dt { font-weight: bold; margin-top: 12px; }
        .detalle dd { margin: 4px 0 0; }
        .vacio { padding: 24px; text-align: center; color: #555; background: #f2f4f7; border-radius: 4px; margin-top: 16px; }
        footer { margin-top: 32px; font-size: 0.85rem; color: #777; border-top: 1px solid #ddd; padding-top: 12px; }
    </style>
</head>
<body>
    <header class="top">
        <h1><a href="{{ route('tareas.index') }}">Gestor de Tareas</a></h1>
        <nav><a href="{{ route('tareas.create') }}">+ Nueva tarea</a></nav>
    </header>

    @if (session('mensaje'))
        <div class="mensaje">{{ session('mensaje') }}</div>
    @endif

    @yield('contenido')

    <footer>esto es un footer</footer>
</body>
</html>
