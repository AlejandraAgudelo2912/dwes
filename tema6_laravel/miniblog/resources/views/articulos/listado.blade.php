@extends('layout')

@section('content')
<h1>MiniBlog</h1>

<hr>

@foreach ($articulos as $articulo)
    <div class="post">
        <h2>
            <a href="{{ route('ver', $articulo) }}">
                {{ $articulo->titulo }}
            </a>
        </h2>
        <small>Publicado el {{ $articulo->created_at->format('d/m/Y') }}</small>

        <form action="{{ route('delete', $articulo) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900" >
                Eliminar
            </button>
        </form>
    </div>
@endforeach
@endsection