<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Computer;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();

        return view('Area.index', compact('areas'));
    }

    public function create()
    {
        $areas = Area::all();
        $computers = Computer::all();

        return view('Area.create', compact('areas', 'computers'));
    }

    public function store(Request $request)
    {
        $area = Area::create($request->all());

        return redirect()->route('areas.index')->with('record', $area->toJson(JSON_PRETTY_PRINT));
    }

    public function edit(Area $area)
    {
        return view('Area.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        $area->update($request->all());

        return redirect()->route('areas.index');
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('areas.index');
    }
}