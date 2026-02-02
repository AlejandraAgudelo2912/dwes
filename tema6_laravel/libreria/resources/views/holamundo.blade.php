@extends('layouts.applications')

@section('title', 'hola')

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
               hola
            </p>

             <div class="mt-6 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                 <p class="text-center text-gray-500">
                    Hola {{"$nombre"." $apellidos"}}, eres de {{$localidad}}
                 </p>

            </div>        
        </section>
    </div>
    
@endsection

