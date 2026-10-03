@extends('layouts.app')

@section('titulo', 'Editar tarea')

@section('contenido')
    <h2>Editar tarea</h2>

    <form action="{{ route('tareas.update', $tarea) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="campo">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $tarea->titulo) }}" maxlength="255" required>
            @error('titulo')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion">{{ old('descripcion', $tarea->descripcion) }}</textarea>
            @error('descripcion')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo check">
            <input type="checkbox" name="completada" id="completada" value="1" @checked(old('completada', $tarea->completada))>
            <label for="completada">Completada</label>
        </div>

        <button type="submit" class="btn btn-guardar">Actualizar</button>
        <a href="{{ route('tareas.index') }}" class="btn">Volver</a>
    </form>
@endsection
