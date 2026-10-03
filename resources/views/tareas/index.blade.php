@extends('layouts.app')

@section('titulo', 'Listado de tareas')

@section('contenido')
    <a href="{{ route('tareas.create') }}" class="btn btn-crear">+ Nueva tarea</a>

    @if ($tareas->isEmpty())
        <div class="vacio">No hay tareas registradas. Crea la primera con el botón superior.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Completada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->titulo }}</td>
                        <td>{{ $tarea->descripcion ?? '—' }}</td>
                        <td>
                            @if ($tarea->completada)
                                <span class="badge badge-si">Sí</span>
                            @else
                                <span class="badge badge-no">No</span>
                            @endif
                        </td>
                        <td class="acciones">
                            <a href="{{ route('tareas.show', $tarea) }}">Ver</a>
                            <a href="{{ route('tareas.edit', $tarea) }}">Editar</a>
                            <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta tarea?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-peligro">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
