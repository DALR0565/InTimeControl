<aside class="hidden md:flex w-64 flex-col bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 p-4">
    <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
    <nav class="flex flex-col space-y-2">
        <a href="{{ route('trabajadores.index') }}" class="px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            Trabajadores
        </a>
        <!-- <a href="#proyectos" class="px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            Proyectos
        </a> -->
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="px-3 w-full text-left cursor-pointer py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                Cerrar sesion
            </button>
        </form>
    </nav>
</aside>
