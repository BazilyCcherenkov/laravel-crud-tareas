@extends('layouts.app')

@section('titulo', 'Crear tarea')

@section('contenido')
    <h2>Crear tarea</h2>

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf

        <div class="campo">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" maxlength="255" required>
            @error('titulo')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-guardar">Guardar</button>
        <a href="{{ route('tareas.index') }}" class="btn">Volver</a>
    </form>
@endsection
