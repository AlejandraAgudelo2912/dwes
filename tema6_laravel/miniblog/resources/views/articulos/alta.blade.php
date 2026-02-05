@extends('layout')

@section('content')
<h1>Nuevo post</h1>

<form action="{{ route('store') }}" method="POST">
    @csrf

    <p>
        <label>Título</label><br>
        <input type="text" name="titulo" required>
    </p>

    <p>
        <label>Contenido</label><br>
        <textarea name="contenido" rows="5" required></textarea>
    </p>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="{{ route('listar') }}">⬅ Volver</a>
@endsection