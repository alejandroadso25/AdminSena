<?php

namespace App\Http\Controllers;

use App\Models\Training_Center;
use App\Models\Computer;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    // Mostrar todos los centros de formación en la vista de lista
    public function index()
    {
        $trainingCenters = Training_Center::all();

        return view('Training_Center.index', compact('trainingCenters'));
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
        $trainingCenter = Training_Center::create($request->all());

        return redirect()->route('training-centers.index')->with('record', $trainingCenter->toJson(JSON_PRETTY_PRINT));
    }

    // Mostrar el formulario de edición con los datos del centro de formación seleccionado cargados
    public function edit(Training_Center $training_center)
    {
        return view('Training_Center.edit', compact('training_center'));
    }

    // Actualizar el centro de formación seleccionado con los datos del formulario
    public function update(Request $request, Training_Center $training_center)
    {
        $training_center->update($request->all());

        return redirect()->route('training-centers.index');
    }

    // Eliminar el centro de formación seleccionado y redirigir a la lista
    public function destroy(Training_Center $training_center)
    {
        $training_center->delete();

        return redirect()->route('training-centers.index');
    }
}
