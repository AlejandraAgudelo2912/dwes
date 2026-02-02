<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Libro;

class LibrosController extends Controller
{
    public function index()
    {
        $libros = Libro::latest()->get();
        return view('libros.listado', ['libros' => $libros]);
    }

    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.libro', ['libro' => $libro]);
    }


    public function create()
    {
        return view('libros.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string',
            'anio_publicacion' => 'nullable|integer|min:1500|max:' . date('Y'),
            'isbn' => 'nullable|string|unique:libros,isbn',
            'descripcion' => 'nullable|string',
            'portada_url' => 'false'
        ]);

        Libro::create($request->all());

        return redirect()->route('listalibros')->with('success', 'Libro creado exitosamente.');
    }


}
