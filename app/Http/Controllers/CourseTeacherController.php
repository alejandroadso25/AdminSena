<?php

namespace App\Http\Controllers;

use App\Models\Course_Teacher;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseTeacherController extends Controller
{
    // Mostrar todas las asignaciones de profesores a cursos
    public function index()
    {
        $courseTeachers = Course_Teacher::all();

        return view('CourseTeacher.index', compact('courseTeachers'));
    }

    // Mostrar detalles de una asignación específica
    public function show(Course_Teacher $courseTeacher)
    {
        return view('CourseTeacher.show', compact('courseTeacher'));
    }

    // Mostrar el formulario para crear una nueva asignación
    public function create()
    {
        $courses = Course::all();
        $teachers = Teacher::all();

        return view('CourseTeacher.create', compact('courses', 'teachers'));
    }

    // Guardar una nueva asignación de profesor a curso
    public function store(Request $request)
    {
        $courseTeacher = Course_Teacher::create($request->all());

        return redirect()->route('course-teachers.index')->with('record', $courseTeacher->toJson(JSON_PRETTY_PRINT));
    }

    // Mostrar el formulario de edición con los datos actuales
    public function edit(Course_Teacher $courseTeacher)
    {
        $courses = Course::all();
        $teachers = Teacher::all();

        return view('CourseTeacher.edit', compact('courseTeacher', 'courses', 'teachers'));
    }

    // Actualizar la asignación de profesor a curso
    public function update(Request $request, Course_Teacher $courseTeacher)
    {
        $courseTeacher->update($request->all());

        return redirect()->route('course-teachers.index');
    }

    // Eliminar una asignación de profesor a curso
    public function destroy(Course_Teacher $courseTeacher)
    {
        $courseTeacher->delete();

        return redirect()->route('course-teachers.index');
    }
}
