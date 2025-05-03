<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/task', function () {
    return redirect()->route('tasks.index');
})->middleware(['auth', 'verified'])->name('task');




Route::middleware('auth')->group(function () {
  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para as tarefas (To-Do List)
    Route::resource('tasks', TaskController::class); // Rotas completas para CRUD
});

require __DIR__.'/auth.php'; 
