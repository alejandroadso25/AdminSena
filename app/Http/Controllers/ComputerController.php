<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComputerController extends Controller
{
    // Mostrar todos los computadores en la vista de tabla
    public function index()
    {
        // Carga la imagen principal junto con cada computador para evitar consultas repetidas.
        $computer = Computer::with('image')->get();

        return view('Computer.index', compact('computer'));
    }

    // Mostrar detalles de un computador específico
    public function show(Computer $computer)
    {
        // Carga la imagen asociada para mostrarla en el detalle del computador.
        $computer->load('image');

        return view('Computer.show', compact('computer'));
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
        // Valida los datos del computador y acepta únicamente imágenes permitidas.
        $data = $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        // Separa el archivo de los datos que pertenecen a la tabla computers.
        $image = $request->file('image');
        unset($data['image']);
        $computer = Computer::create($data);

        if ($image) {
            // Guarda el archivo en storage/app/public y conserva solo su ruta en la base de datos.
            $path = $image->store('computers', 'public');
            $computer->image()->create([
                'path' => $path,
                'file_name' => basename($path),
                'original_name' => $image->getClientOriginalName(),
                'alt_text' => 'Imagen del computador '.$computer->number,
                'is_primary' => true,
            ]);
        }

        return redirect()->route('computers.index')->with('record', $computer->toJson(JSON_PRETTY_PRINT));
    }

    // Mostrar el formulario de edición con los valores actuales del computador seleccionado
    public function edit(Computer $computer)
    {
        // Carga la imagen actual para mostrarla en el formulario de edición.
        $computer->load('image');

        return view('Computer.edit', compact('computer'));
    }

    // Actualizar el registro del computador existente y regresar a la lista
    public function update(Request $request, Computer $computer)
    {
        // Valida los campos del computador y permite reemplazar su imagen principal.
        $data = $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        // Evita enviar el archivo al modelo Computer, que no tiene esa columna.
        $image = $request->file('image');
        unset($data['image']);
        $computer->update($data);

        if ($image) {
            // Elimina el archivo anterior antes de guardar el nuevo para no dejar residuos.
            $currentImage = $computer->image;
            if ($currentImage) {
                Storage::disk('public')->delete($currentImage->path);
                $currentImage->delete();
            }

            $path = $image->store('computers', 'public');
            $computer->image()->create([
                'path' => $path,
                'file_name' => basename($path),
                'original_name' => $image->getClientOriginalName(),
                'alt_text' => 'Imagen del computador '.$computer->number,
                'is_primary' => true,
            ]);
        }

        return redirect()->route('computers.index');
    }

    // Eliminar un computador y redirigir a la lista
    public function destroy(Computer $computer)
    {
        // Elimina primero el archivo físico y su registro relacionado.
        $computer->load('image');
        if ($computer->image) {
            Storage::disk('public')->delete($computer->image->path);
            $computer->image->delete();
        }

        $computer->delete();

        return redirect()->route('computers.index');
    }
}