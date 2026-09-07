<?php

namespace App\Http\Controllers;

use App\Models\Training_Center;
use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingCenterController extends Controller
{
    // Mostrar todos los centros de formación en la vista de lista
    public function index()
    {
        // Carga la imagen principal junto con cada centro para el listado.
        $trainingCenters = Training_Center::with('image')->get();

        return view('Training_Center.index', compact('trainingCenters'));
    }

    // Mostrar detalles de un centro de formación específico
    public function show(Training_Center $training_center)
    {
        // Carga la imagen asociada para mostrarla en el detalle del centro.
        $training_center->load('image');

        return view('Training_Center.show', compact('training_center'));
    }

    // Mostrar el formulario para crear un nuevo centro de formación
    public function create()
    {
        $trainingCenters = Training_Center::all();
        $computers = Computer::all();

        return view('Training_Center.create', compact('trainingCenters', 'computers'));
    }

    // Guardar un nuevo centro de formación en la base de datos
    public function store(Request $request)
    {
        // Valida los datos del centro y el formato de la imagen opcional.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        // Separa el archivo de los campos de la tabla training__centers.
        $image = $request->file('image');
        unset($data['image']);
        $trainingCenter = Training_Center::create($data);

        if ($image) {
            // Guarda la imagen del centro en el almacenamiento público local.
            $path = $image->store('training-centers', 'public');
            $trainingCenter->image()->create([
                'path' => $path,
                'file_name' => basename($path),
                'original_name' => $image->getClientOriginalName(),
                'alt_text' => 'Imagen del centro '.$trainingCenter->name,
                'is_primary' => true,
            ]);
        }

        return redirect()->route('training-centers.index')->with('record', $trainingCenter->toJson(JSON_PRETTY_PRINT));
    }

    // Mostrar el formulario de edición con los datos del centro de formación seleccionado cargados
    public function edit(Training_Center $training_center)
    {
        // Carga la imagen actual para mostrarla y permitir reemplazarla.
        $training_center->load('image');

        return view('Training_Center.edit', compact('training_center'));
    }

    // Actualizar el centro de formación seleccionado con los datos del formulario
    public function update(Request $request, Training_Center $training_center)
    {
        // Valida los datos y permite reemplazar la imagen principal del centro.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        // Evita enviar el archivo al modelo Training_Center, que no tiene esa columna.
        $image = $request->file('image');
        unset($data['image']);
        $training_center->update($data);

        if ($image) {
            // Elimina la imagen anterior antes de guardar la nueva.
            $currentImage = $training_center->image;
            if ($currentImage) {
                Storage::disk('public')->delete($currentImage->path);
                $currentImage->delete();
            }

            $path = $image->store('training-centers', 'public');
            $training_center->image()->create([
                'path' => $path,
                'file_name' => basename($path),
                'original_name' => $image->getClientOriginalName(),
                'alt_text' => 'Imagen del centro '.$training_center->name,
                'is_primary' => true,
            ]);
        }

        return redirect()->route('training-centers.index');
    }

    // Eliminar el centro de formación seleccionado y redirigir a la lista
    public function destroy(Training_Center $training_center)
    {
        // Elimina el archivo físico y su registro antes del centro de formación.
        $training_center->load('image');
        if ($training_center->image) {
            Storage::disk('public')->delete($training_center->image->path);
            $training_center->image->delete();
        }

        $training_center->delete();

        return redirect()->route('training-centers.index');
    }
}
