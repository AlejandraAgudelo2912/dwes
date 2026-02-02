<nav class="bg-white shadow-md">
    <ul class="flex items-center gap-6 px-6 py-4">
        <li>
            <a href="{{ route('welcome') }}"
               class="text-gray-700 font-medium hover:text-indigo-600 transition">
                 Inicio
            </a>
        </li>
        <li>
            <a href="{{ route('listalibros') }}"
               class="text-gray-700 font-medium hover:text-indigo-600 transition">
                 Listado
            </a>
        </li>

        <li>
            <a href="{{ route('altalibro') }}"
               class="text-gray-700 font-medium hover:text-indigo-600 transition">
                 Alta
            </a>
        </li>
    </ul>
</nav>
