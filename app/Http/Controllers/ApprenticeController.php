<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\Computer;
use App\Models\Course;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function index()
    {
        $apprentices = Apprentice::all();

        return view('Apprentice.index', compact('apprentices'));
    }

    public function create()
    {
        $courses = Course::all();
        $computers = Computer::all();
        $apprentices = Apprentice::all();

        return view('Apprentice.create', compact('courses', 'computers', 'apprentices'));
    }

    public function store(Request $request)
    {
        $apprentice = Apprentice::create($request->all());

        return redirect()->route('apprentices.index')->with('record', $apprentice->toJson(JSON_PRETTY_PRINT));
    }

    public function edit(Apprentice $apprentice)
    {
        $courses = Course::all();
        $computers = Computer::all();

        return view('Apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, Apprentice $apprentice)
    {
        $apprentice->update($request->all());

        return redirect()->route('apprentices.index');
    }

    public function destroy(Apprentice $apprentice)
    {
        $apprentice->delete();

        return redirect()->route('apprentices.index');
    }
}


