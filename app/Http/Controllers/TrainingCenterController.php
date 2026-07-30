<?php

namespace App\Http\Controllers;

use App\Models\Training_Center;
use App\Models\Computer;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    public function index()
    {
        $trainingCenters = Training_Center::all();

        return view('Training_Center.index', compact('trainingCenters'));
    }

    public function create()
    {
        $trainingCenters = Training_Center::all();
        $computers = Computer::all();

        return view('Training_Center.create', compact('trainingCenters', 'computers'));
    }

    public function store(Request $request)
    {
        $trainingCenter = Training_Center::create($request->all());

        return redirect()->route('training-centers.index')->with('record', $trainingCenter->toJson(JSON_PRETTY_PRINT));
    }

    public function edit(Training_Center $training_center)
    {
        return view('Training_Center.edit', compact('training_center'));
    }

    public function update(Request $request, Training_Center $training_center)
    {
        $training_center->update($request->all());

        return redirect()->route('training-centers.index');
    }

    public function destroy(Training_Center $training_center)
    {
        $training_center->delete();

        return redirect()->route('training-centers.index');
    }
}
