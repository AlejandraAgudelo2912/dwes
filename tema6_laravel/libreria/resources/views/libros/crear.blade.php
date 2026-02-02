@extends('layouts.applications')

@section('title', 'Alta de libros')

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
                Formulario para crear un libro
            </p>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block sm:inline">Por favor corrige los siguientes errores:</span>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mt-6 flex flex-col items-center">
                <form action="{{ route('libros.store') }}" method="POST" class="w-full max-w-lg">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                            Título
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="titulo" name="titulo" type="text" placeholder="Título del libro" value="{{ old('titulo') }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="autor" >
                            Autor
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="autor" name="autor" type="text" placeholder="Autor del libro" value="{{ old('autor') }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="anio_publicacion">
                            Año de Publicación
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="anio_publicacion" name="anio_publicacion" type="number" placeholder="Año de publicación" value="{{ old('anio_publicacion') }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="genero">
                            Género
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="genero" name="genero" type="text" placeholder="Género del libro" value="{{ old('genero') }}">
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Crear Libro
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </div>

    
@endsection
