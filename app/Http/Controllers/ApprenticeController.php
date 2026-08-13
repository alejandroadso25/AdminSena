<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\Computer;
use App\Models\Course;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    // Mostrar todos los aprendices en la vista de tabla
    public function index()
    {
        $apprentices = Apprentice::all();

        return view('Apprentice.index', compact('apprentices'));
    }

    // Mostrar detalles de un aprendiz específico
    public function show(Apprentice $apprentice)
    {
        return view('Apprentice.show', compact('apprentice'));
    }

    // Mostrar el formulario para registrar un nuevo aprendiz
    public function create()
    {
        $courses = Course::all();
        $computers = Computer::all();
        $apprentices = Apprentice::all();

        return view('Apprentice.create', compact('courses', 'computers', 'apprentices'));
    }

    // Guardar un nuevo aprendiz en la base de datos
    public function store(Request $request)
    {
        $apprentice = Apprentice::create($request->all());

        return redirect()->route('apprentices.index')->with('record', $apprentice->toJson(JSON_PRETTY_PRINT));
    }

    // Mostrar el formulario de edición con los valores actuales cargados
    public function edit(Apprentice $apprentice)
    {
        $courses = Course::all();
        $computers = Computer::all();

        return view('Apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    // Actualizar el aprendiz seleccionado con los datos proporcionados
    public function update(Request $request, Apprentice $apprentice)
    {
        $apprentice->update($request->all());

        return redirect()->route('apprentices.index');
    }

    // Eliminar el aprendiz seleccionado y redirigir a la lista
    public function destroy(Apprentice $apprentice)
    {
        $apprentice->delete();

        return redirect()->route('apprentices.index');
    }
}


