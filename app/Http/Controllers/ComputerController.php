<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    // Mostrar todos los computadores en la vista de tabla
    public function index()
    {
        $computer = Computer::all();

        return view('Computer.index', compact('computer'));
    }

    // Mostrar el formulario para crear un nuevo computador
    public function create()
    {
        $computers = Computer::all();

        return view('Computer.create', compact('computers'));
    }

    // Guardar un nuevo computador y redirigir a la lista de computadores
    public function store(Request $request)
    {
        $computer = Computer::create($request->all());

        return redirect()->route('computers.index')->with('record', $computer->toJson(JSON_PRETTY_PRINT));
    }

    // Mostrar el formulario de edición con los valores actuales del computador seleccionado
    public function edit(Computer $computer)
    {
        return view('Computer.edit', compact('computer'));
    }

    // Actualizar el registro del computador existente y regresar a la lista
    public function update(Request $request, Computer $computer)
    {
        $computer->update($request->all());

        return redirect()->route('computers.index');
    }

    // Eliminar un computador y redirigir a la lista
    public function destroy(Computer $computer)
    {
        $computer->delete();

        return redirect()->route('computers.index');
    }
}