<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Course;
use App\Models\Training_Center;
use App\Models\Computer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Muestra los cursos disponibles para inscripción.
     */
    public function offers()
    {
        // Catálogo permitido para convocatorias, administrado desde courses.
        $programs = [
            'ADSO', 'Sistemas', 'Animación 3D', 'Mecatrónica', 'Barismo',
            'Cocina', 'Enfermería', 'Actividad Física', 'Ebanistería',
            'Gestión Administrativa',
        ];
        $courses = Course::with('trainingCenter')
            ->where(function ($query) use ($programs) {
                // Acepta el nombre nuevo y conserva los registros antiguos compatibles.
                $query->whereIn('program_name', $programs)
                    ->orWhereIn('course_number', $programs);
            })
            ->withCount('enrollments')
            ->get();

        return view('convocatorias.index', compact('courses'));
    }

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
        // Valida la información antes de guardar un programa desde el formulario.
        $data = $request->validate([
            'course_number' => ['required', 'string', 'max:255'],
            'program_name' => ['required', 'string', 'max:255'],
            'day' => ['required', 'string', 'max:255'],
            'training_type' => ['required', 'in:técnico,tecnólogo'],
            'location' => ['required', 'string', 'max:255'],
            'is_open' => ['boolean'],
            'description' => ['nullable', 'string'],
            'duration' => ['nullable', 'string', 'max:100'],
            'capacity' => ['nullable', 'integer', 'min:1'],
            'area_id' => ['nullable', 'exists:areas,id'],
            'training_center_id' => ['nullable', 'exists:training__centers,id'],
        ]);
        $data['is_open'] = $request->boolean('is_open');
        $course = Course::create($data);

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
        // Usa las mismas reglas para mantener consistentes los datos editados.
        $data = $request->validate([
            'course_number' => ['required', 'string', 'max:255'],
            'program_name' => ['required', 'string', 'max:255'],
            'day' => ['required', 'string', 'max:255'],
            'training_type' => ['required', 'in:técnico,tecnólogo'],
            'location' => ['required', 'string', 'max:255'],
            'is_open' => ['boolean'],
            'description' => ['nullable', 'string'],
            'duration' => ['nullable', 'string', 'max:100'],
            'capacity' => ['nullable', 'integer', 'min:1'],
            'area_id' => ['nullable', 'exists:areas,id'],
            'training_center_id' => ['nullable', 'exists:training__centers,id'],
        ]);
        $data['is_open'] = $request->boolean('is_open');
        $course->update($data);

        return redirect()->route('courses.index');
    }

    // Eliminar el curso seleccionado y redirigir a la lista
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index');
    }
}