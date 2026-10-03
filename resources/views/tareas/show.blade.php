@extends('layouts.app')

@section('titulo', 'Detalle de tarea')

@section('contenido')
    <h2>{{ $tarea->titulo }}</h2>

    <dl class="detalle">
        <dt>Descripción</dt>
        <dd>{{ $tarea->descripcion ?? '—' }}</dd>

        <dt>Completada</dt>
        <dd>
            @if ($tarea->completada)
                <span class="badge badge-si">Sí</span>
            @else
                <span class="badge badge-no">No</span>
            @endif
        </dd>

        <dt>Creada</dt>
        <dd>{{ $tarea->created_at }}</dd>

        <dt>Actualizada</dt>
        <dd>{{ $tarea->updated_at }}</dd>
    </dl>

    <p>
        <a href="{{ route('tareas.edit', $tarea) }}" class="btn">Editar</a>
        <a href="{{ route('tareas.index') }}" class="btn">Volver</a>
    </p>

    <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" onsubmit="return confirm('¿Eliminar esta tarea?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-peligro">Eliminar</button>
    </form>
@endsection
