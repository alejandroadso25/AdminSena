<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Course;
use App\Models\Training_Center;
use App\Models\Computer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Mostrar todos los cursos en la vista de tabla
    public function index()
    {
        $courses = Course::all();

        return view('Course.index', compact('courses'));
    }

    // Mostrar detalles de un curso específico
    public function show(Course $course)
    {
        return view('Course.show', compact('course'));
    }

    // Mostrar el formulario para crear un nuevo curso
    public function create()
    {
        $areas = Area::all();
        $training_centers = Training_Center::all();
        $courses = Course::all();
        $computers = Computer::all();

        return view('Course.create', compact('areas', 'training_centers', 'courses', 'computers'));
    }

    // Guardar un nuevo curso en la base de datos
    public function store(Request $request)
    {
        $course = Course::create($request->all());

        return redirect()->route('courses.index')->with('record', $course->toJson(JSON_PRETTY_PRINT));
    }

    // Mostrar el formulario de edición con los datos del curso seleccionado cargados
    public function edit(Course $course)
    {
        $areas = Area::all();
        $training_centers = Training_Center::all();

        return view('Course.edit', compact('course', 'areas', 'training_centers'));
    }

    // Actualizar el curso seleccionado con los datos del formulario
    public function update(Request $request, Course $course)
    {
        $course->update($request->all());

        return redirect()->route('courses.index');
    }

    // Eliminar el curso seleccionado y redirigir a la lista
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index');
    }
}