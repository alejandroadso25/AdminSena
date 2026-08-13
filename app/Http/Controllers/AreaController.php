<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Computer;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    // Mostrar todas las áreas en la vista de lista
    public function index()
    {
        $areas = Area::all();

        return view('Area.index', compact('areas'));
    }

    // Mostrar detalles de un área específica
    public function show(Area $area)
    {
        return view('Area.show', compact('area'));
    }

    // Mostrar el formulario para crear una nueva área
    public function create()
    {
        $areas = Area::all();
        $computers = Computer::all();

        return view('Area.create', compact('areas', 'computers'));
    }

    // Guardar una nueva área en la base de datos
    public function store(Request $request)
    {
        $area = Area::create($request->all());

        return redirect()->route('areas.index')->with('record', $area->toJson(JSON_PRETTY_PRINT));
    }

    // Mostrar el formulario de edición con los datos de la área seleccionada cargados
    public function edit(Area $area)
    {
        return view('Area.edit', compact('area'));
    }

    // Actualizar la área seleccionada con los datos del formulario
    public function update(Request $request, Area $area)
    {
        $area->update($request->all());

        return redirect()->route('areas.index');
    }

    // Eliminar la área seleccionada y redirigir a la lista
    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('areas.index');
    }
}