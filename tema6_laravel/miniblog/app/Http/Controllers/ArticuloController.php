<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    public function listar() {
        $articulos = Articulo::all();
        return view('articulos.listado', ['articulos'=>$articulos]);
        
    }

    public function ver($id) {
        $articulo = Articulo::findOrFail($id);
        return view('articulos.ver', ['articulo'=>$articulo]);
        
    }

    public function alta() {
        return view('articulos.alta');
        
    }

    public function store(Request $request) {
        $request->validate([
            'titulo' => 'required|string|max:225',
            'contenido' => 'required|string'
        ]);

        Articulo::create($request->all());

        return redirect()->route('listar')->with('success','Articulo insertado correctamente');
        
    }

    public function delete($id) {
        $articulo = Articulo::findOrFail($id);
        $articulo->delete();

        return redirect()->route('listar')->with('success','Articulo eliminado correctamente');
        
    }
}
