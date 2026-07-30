<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Course;
use App\Models\Training_Center;
use App\Models\Computer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('Course.index', compact('courses'));
    }

    public function create()
    {
        $areas = Area::all();
        $training_centers = Training_Center::all();
        $courses = Course::all();
        $computers = Computer::all();

        return view('Course.create', compact('areas', 'training_centers', 'courses', 'computers'));
    }

    public function store(Request $request)
    {
        $course = Course::create($request->all());

        return redirect()->route('courses.index')->with('record', $course->toJson(JSON_PRETTY_PRINT));
    }

    public function edit(Course $course)
    {
        $areas = Area::all();
        $training_centers = Training_Center::all();

        return view('Course.edit', compact('course', 'areas', 'training_centers'));
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());

        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index');
    }
}