@extends('layout')

@section('content')
<h1>MiniBlog</h1>

<hr>

<h1>{{ $articulo->titulo }}</h1>

<p>
    <small>Publicado el {{ $articulo->created_at->format('d/m/Y') }}</small>
</p>

<p>
    {{ $articulo->contenido }}
</p>


<a href="{{ route('listar') }}">⬅ Volver al listado</a>
@endsection