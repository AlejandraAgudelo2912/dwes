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
                Detalles del libro con id {{ $libro->id }}
            </p>

            <div class="mt-6 flex flex-col items-center">
                <h2 class="text-2xl font-semibold mb-2">{{ $libro->titulo }}</h2>
                <p class="text-gray-600 mb-1">Autor: {{ $libro->autor }}</p>
                <p class="text-gray-600 mb-1">Año: {{ $libro->anio_publicacion }}</p>
                <p class="text-gray-600">Género: {{ $libro->genero }}</p>
        </section>

    </div>

    
@endsection
