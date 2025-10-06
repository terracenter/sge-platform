<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Plataforma</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-xl font-bold text-gray-800">Mi Plataforma</h1>
                <div class="space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                Cerrar Sesión
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Bienvenido</h1>
            <p class="text-xl text-gray-600">Selecciona un módulo para comenzar</p>
        </div>

        <!-- Módulos públicos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-4xl mx-auto">
            @foreach($publicModules as $module)
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow text-center">
                <div class="text-4xl mb-4">{{ $module['icon'] }}</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $module['name'] }}</h3>
                <p class="text-gray-600 mb-4">{{ $module['description'] }}</p>
                <a href="{{ route($module['route']) }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 inline-block">
                    Acceder
                </a>
            </div>
            @endforeach
        </div>

        <!-- Mensaje para usuarios autenticados -->
        @auth
        <div class="mt-12 text-center">
            <p class="text-gray-600 mb-4">¿Necesitas acceder a módulos privados?</p>
            <a href="{{ route('dashboard') }}" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 inline-block">
                Ir al Dashboard
            </a>
        </div>
        @endauth
    </main>
</body>
</html>