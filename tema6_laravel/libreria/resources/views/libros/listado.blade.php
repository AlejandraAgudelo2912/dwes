@extends('layouts.applications')

@section('title', 'Listado de libros')

@section('content')
    <div class="max-w-6xl mx-auto">

        <header class="text-center mb-10">
            <h1 class="text-4xl font-bold mb-3">
                Bienvenido
            </h1>

            <p class="text-lg text-gray-600">
                Página principal con Blade
            </p>
        </header>

        <section class="bg-white rounded-lg shadow p-6">
            <p class="text-center text-gray-500">
                Aquí aparecerá el listado de libros
            </p>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($libros as $libro)
                    <div class="border rounded-lg p-4 flex flex-col items-center">
                        <h2 class="text-xl font-semibold mb-2">{{ $libro->titulo }}</h2>
                        <p class="text-gray-600 mb-1">Autor: {{ $libro->autor }}</p>
                        <p class="text-gray-600 mb-1">Año: {{ $libro->anio_publicacion }}</p>
                        <p class="text-gray-600">Género: {{ $libro->genero }}</p>
                    </div>
                @endforeach
            </div>
        </section>

    </div>

    
@endsection
