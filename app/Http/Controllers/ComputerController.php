<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index()
    {
        $computer = Computer::all();

        return view('Computer.index', compact('computer'));
    }

    public function create()
    {
        $computers = Computer::all();

        return view('Computer.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $computer = Computer::create($request->all());

        return redirect()->route('computers.index')->with('record', $computer->toJson(JSON_PRETTY_PRINT));
    }

    public function edit(Computer $computer)
    {
        return view('Computer.edit', compact('computer'));
    }

    public function update(Request $request, Computer $computer)
    {
        $computer->update($request->all());

        return redirect()->route('computers.index');
    }

    public function destroy(Computer $computer)
    {
        $computer->delete();

        return redirect()->route('computers.index');
    }
}