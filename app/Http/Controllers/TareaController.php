<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // listar todas las tareas

    public function index()
    {
        $tareas = Tarea::latest()->get();
        return view('tareas.index', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // formulacion de creacion
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // guardar un nueva tarea
    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'titulo'    => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Tarea::create($datosValidados);
        return redirect()
            -> route('tareas.index')
            ->with('mensaje', 'Tarea creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    //mostrar otro formulario
    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    //
    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        $datosValidados = $request->validate([
            'titulo'    => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'completada' => 'nullable|boolean',

        ]);
        $datosValidados['completada'] = $request->has('completada');
        $tarea->update($datosValidados);

        return redirect()
            ->route('tareas.index')
            ->with('mensaje', 'Tarea actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Eliminacion
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect()
            ->route('tareas.index')
            ->with('mensaje', 'Tarea eleiminada correctamente.');
    }
}
