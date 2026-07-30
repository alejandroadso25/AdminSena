<?php

use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrainingCenterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de áreas: listar, crear, guardar, editar, actualizar, eliminar
Route::get('areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::post('areas', [AreaController::class, 'store'])->name('areas.store');
Route::get('areas/{area}/edit', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('areas/{area}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('areas/{area}', [AreaController::class, 'destroy'])->name('areas.destroy');

// Rutas de centros de formación: listar, crear, guardar, editar, actualizar, eliminar
Route::get('training-centers', [TrainingCenterController::class, 'index'])->name('training-centers.index');
Route::get('training-centers/create', [TrainingCenterController::class, 'create'])->name('training-centers.create');
Route::post('training-centers', [TrainingCenterController::class, 'store'])->name('training-centers.store');
Route::get('training-centers/{training_center}/edit', [TrainingCenterController::class, 'edit'])->name('training-centers.edit');
Route::put('training-centers/{training_center}', [TrainingCenterController::class, 'update'])->name('training-centers.update');
Route::delete('training-centers/{training_center}', [TrainingCenterController::class, 'destroy'])->name('training-centers.destroy');

// Rutas de computadores: listar, crear, guardar, editar, actualizar, eliminar
Route::get('computers', [ComputerController::class, 'index'])->name('computers.index');
Route::get('computers/create', [ComputerController::class, 'create'])->name('computers.create');
Route::post('computers', [ComputerController::class, 'store'])->name('computers.store');
Route::get('computers/{computer}/edit', [ComputerController::class, 'edit'])->name('computers.edit');
Route::put('computers/{computer}', [ComputerController::class, 'update'])->name('computers.update');
Route::delete('computers/{computer}', [ComputerController::class, 'destroy'])->name('computers.destroy');

// Rutas de cursos: listar, crear, guardar, editar, actualizar, eliminar
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('courses/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

// Rutas de instructores: listar, crear, guardar, editar, actualizar, eliminar
Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

// Rutas de aprendices: listar, crear, guardar, editar, actualizar, eliminar
Route::get('apprentices', [ApprenticeController::class, 'index'])->name('apprentices.index');
Route::get('apprentices/create', [ApprenticeController::class, 'create'])->name('apprentices.create');
Route::post('apprentices', [ApprenticeController::class, 'store'])->name('apprentices.store');
Route::get('apprentices/{apprentice}/edit', [ApprenticeController::class, 'edit'])->name('apprentices.edit');
Route::put('apprentices/{apprentice}', [ApprenticeController::class, 'update'])->name('apprentices.update');
Route::delete('apprentices/{apprentice}', [ApprenticeController::class, 'destroy'])->name('apprentices.destroy');