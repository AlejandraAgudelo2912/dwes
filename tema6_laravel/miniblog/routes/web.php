<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {return view('welcome');});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [ArticuloController::class, 'listar'])->name('listar');
Route::get('/alta', [ArticuloController::class, 'alta'])->name('alta');
Route::post('/', [ArticuloController::class, 'store'])->name('store');
Route::get('/articulo/{id}', [ArticuloController::class, 'ver'])->name('ver');
Route::delete('/articulo/{id}', [ArticuloController::class, 'delete'])->name('delete');

require __DIR__.'/auth.php';
