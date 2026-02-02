<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mi Web')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-800">

    @include('layouts.menu')

    <main class="max-w-7xl mx-auto px-6 py-8">
        @yield('content')
    </main>

</body>
</html>
