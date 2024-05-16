<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

Route::get('/', [ToDoController::class, 'index'])->name('to_dos.index');
Route::post('/to_dos', [ToDoController::class, 'store'])->name('to_dos.store');
Route::delete('/to_dos', [ToDoController::class, 'destroyAll'])->name('to_dos.destroy_all');
Route::put('/to_dos/{to_do}/complete', [ToDoController::class, 'toggleCompleted'])->name('to_dos.toggleCompleted');
Route::delete('/to_dos/completed', [ToDoController::class, 'deleteCompleted'])->name('to_dos.deleteCompleted');