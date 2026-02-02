<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/libros/create', [\App\Http\Controllers\LibrosController::class, 'create'])->name('altalibro');
Route::get('/libros', [\App\Http\Controllers\LibrosController::class, 'index'])->name('listalibros');
Route::get('/libros/{id}', [\App\Http\Controllers\LibrosController::class, 'show'])->name('libro');
Route::post('/libros', [\App\Http\Controllers\LibrosController::class, 'store'])->name('libros.store');

Route::get('/hola', function (){
    $ciudad = "murcia";
    return view('holamundo',[
        "nombre"=>"manolo",
        "apellidos"=>"perez reberte",
        "localidad" => $ciudad
        ]);
})->name('hola');

Route::get('/libros/alta', function () {
    return view('libros.alta');
})->name('altalibros');


require __DIR__.'/auth.php';
