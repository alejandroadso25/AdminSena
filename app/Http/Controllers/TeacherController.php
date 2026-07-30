<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Teacher;
use App\Models\Training_Center;
use App\Models\Computer;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Mostrar todos los instructores en la vista de tabla
    public function index()
    {
        $teachers = Teacher::all();

        return view('Teacher.index', compact('teachers'));
    }

    // Mostrar el formulario para crear un nuevo instructor
    public function create()
    {
        $areas = Area::all();
        $trainingCenters = Training_Center::all();
        $teachers = Teacher::all();
        $computers = Computer::all();

        return view('Teacher.create', compact('areas', 'trainingCenters', 'teachers', 'computers'));
    }

    // Guardar un nuevo instructor en la base de datos
    public function store(Request $request)
    {
        $teacher = Teacher::create($request->all());

        return redirect()->route('teachers.index')->with('record', $teacher->toJson(JSON_PRETTY_PRINT));
    }

    // Mostrar el formulario de edición con los datos del instructor seleccionado cargados
    public function edit(Teacher $teacher)
    {
        $areas = Area::all();
        $trainingCenters = Training_Center::all();

        return view('Teacher.edit', compact('teacher', 'areas', 'trainingCenters'));
    }

    // Actualizar el instructor seleccionado con los datos del formulario
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update($request->all());

        return redirect()->route('teachers.index');
    }

    // Eliminar el instructor seleccionado y redirigir a la lista
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index');
    }
}

