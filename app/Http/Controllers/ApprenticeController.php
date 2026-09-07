<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\Computer;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApprenticeController extends Controller
{
    // Mostrar todos los aprendices en la vista de tabla
    public function index()
    {
        // Carga la imagen principal junto con cada aprendiz para mostrarla en el listado.
        $apprentices = Apprentice::with('image')->get();

        return view('Apprentice.index', compact('apprentices'));
    }

    // Mostrar detalles de un aprendiz específico
    public function show(Apprentice $apprentice)
    {
        // Carga las relaciones necesarias para mostrar los datos y la imagen del aprendiz.
        $apprentice->load(['course', 'computer', 'image']);

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
        // Valida los datos del aprendiz y el formato de la imagen opcional.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'cell_number' => ['required', 'string', 'max:30'],
            'course_id' => ['required', 'exists:courses,id'],
            'computer_id' => ['required', 'exists:computers,id'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        // Separa el archivo de los campos propios de la tabla apprentices.
        $image = $request->file('image');
        unset($data['image']);
        $apprentice = Apprentice::create($data);

        if ($image) {
            // Guarda la imagen del aprendiz en el disco público local.
            $path = $image->store('apprentices', 'public');
            $apprentice->image()->create([
                'path' => $path,
                'file_name' => basename($path),
                'original_name' => $image->getClientOriginalName(),
                'alt_text' => 'Imagen del aprendiz '.$apprentice->name,
                'is_primary' => true,
            ]);
        }

        return redirect()->route('apprentices.index')->with('record', $apprentice->toJson(JSON_PRETTY_PRINT));
    }

    // Mostrar el formulario de edición con los valores actuales cargados
    public function edit(Apprentice $apprentice)
    {
        $courses = Course::all();
        $computers = Computer::all();
        // Carga la imagen actual para mostrarla en el formulario de edición.
        $apprentice->load('image');

        return view('Apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    // Actualizar el aprendiz seleccionado con los datos proporcionados
    public function update(Request $request, Apprentice $apprentice)
    {
        // Valida los datos y permite reemplazar la imagen principal del aprendiz.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'cell_number' => ['required', 'string', 'max:30'],
            'course_id' => ['required', 'exists:courses,id'],
            'computer_id' => ['required', 'exists:computers,id'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        // Evita enviar el archivo al modelo Apprentice, que no tiene esa columna.
        $image = $request->file('image');
        unset($data['image']);
        $apprentice->update($data);

        if ($image) {
            // Elimina la imagen anterior antes de registrar la nueva ruta.
            $currentImage = $apprentice->image;
            if ($currentImage) {
                Storage::disk('public')->delete($currentImage->path);
                $currentImage->delete();
            }

            $path = $image->store('apprentices', 'public');
            $apprentice->image()->create([
                'path' => $path,
                'file_name' => basename($path),
                'original_name' => $image->getClientOriginalName(),
                'alt_text' => 'Imagen del aprendiz '.$apprentice->name,
                'is_primary' => true,
            ]);
        }

        return redirect()->route('apprentices.index');
    }

    // Eliminar el aprendiz seleccionado y redirigir a la lista
    public function destroy(Apprentice $apprentice)
    {
        // Elimina la imagen almacenada antes de eliminar al aprendiz.
        $apprentice->load('image');
        if ($apprentice->image) {
            Storage::disk('public')->delete($apprentice->image->path);
            $apprentice->image->delete();
        }

        $apprentice->delete();

        return redirect()->route('apprentices.index');
    }
}


