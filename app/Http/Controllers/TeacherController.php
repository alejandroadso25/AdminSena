<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Teacher;
use App\Models\Training_Center;
use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    // Mostrar todos los instructores en la vista de tabla
    public function index()
    {
        // Carga la imagen principal junto con cada instructor para el listado.
        $teachers = Teacher::with('image')->get();

        return view('Teacher.index', compact('teachers'));
    }

    // Mostrar detalles de un instructor específico
    public function show(Teacher $teacher)
    {
        // Carga las relaciones y la imagen para mostrar el detalle completo.
        $teacher->load(['area', 'trainingCenter', 'image']);

        return view('Teacher.show', compact('teacher'));
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
        // Valida los datos del instructor y la imagen opcional.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'area_id' => ['required', 'exists:areas,id'],
            'training_center_id' => ['required', 'exists:training__centers,id'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        // Separa el archivo de los campos que pertenecen a la tabla teachers.
        $image = $request->file('image');
        unset($data['image']);
        $teacher = Teacher::create($data);

        if ($image) {
            // Guarda la imagen del instructor en el almacenamiento público local.
            $path = $image->store('teachers', 'public');
            $teacher->image()->create([
                'path' => $path,
                'file_name' => basename($path),
                'original_name' => $image->getClientOriginalName(),
                'alt_text' => 'Imagen del instructor '.$teacher->name,
                'is_primary' => true,
            ]);
        }

        // Redirige a la lista de instructores después de guardar el registro.
        return redirect()->route('teachers.index')->with('record', $teacher->toJson(JSON_PRETTY_PRINT));
    }

    // Mostrar el formulario de edición con los datos del instructor seleccionado cargados
    public function edit(Teacher $teacher)
    {
        $areas = Area::all();
        $trainingCenters = Training_Center::all();
        // Carga la imagen actual para mostrarla y permitir reemplazarla.
        $teacher->load('image');

        return view('Teacher.edit', compact('teacher', 'areas', 'trainingCenters'));
    }

    // Actualizar el instructor seleccionado con los datos del formulario
    public function update(Request $request, Teacher $teacher)
    {
        // Valida los datos y permite reemplazar la imagen principal del instructor.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'area_id' => ['required', 'exists:areas,id'],
            'training_center_id' => ['required', 'exists:training__centers,id'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        // Evita enviar el archivo al modelo Teacher, que no tiene esa columna.
        $image = $request->file('image');
        unset($data['image']);
        $teacher->update($data);

        if ($image) {
            // Elimina la imagen anterior antes de guardar la nueva.
            $currentImage = $teacher->image;
            if ($currentImage) {
                Storage::disk('public')->delete($currentImage->path);
                $currentImage->delete();
            }

            $path = $image->store('teachers', 'public');
            $teacher->image()->create([
                'path' => $path,
                'file_name' => basename($path),
                'original_name' => $image->getClientOriginalName(),
                'alt_text' => 'Imagen del instructor '.$teacher->name,
                'is_primary' => true,
            ]);
        }

        // Redirige a la lista de instructores después de actualizar el registro.
        return redirect()->route('teachers.index');
    }

    // Eliminar el instructor seleccionado y redirigir a la lista
    public function destroy(Teacher $teacher)
    {
        // Elimina el archivo físico y el registro relacionado antes del instructor.
        $teacher->load('image');
        if ($teacher->image) {
            Storage::disk('public')->delete($teacher->image->path);
            $teacher->image->delete();
        }

        $teacher->delete();

        // Redirige a la lista de instructores después de eliminar el registro.
        return redirect()->route('teachers.index');
    }
}

