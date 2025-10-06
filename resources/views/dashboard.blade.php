<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-xl font-bold text-gray-800">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Bienvenido</span>
                    <!-- Formulario de logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Módulos Activos</h2>
            <p class="text-gray-600">Selecciona un módulo para gestionar</p>
        </div>

        <!-- Tarjetas de módulos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Módulo de Posts -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center mb-4">
                    <span class="text-2xl mr-3">📝</span>
                    <h3 class="text-xl font-semibold text-gray-800">Posts</h3>
                </div>
                <p class="text-gray-600 mb-4">Gestiona los artículos del blog</p>
                <a href="{{ route('posts.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 inline-block">
                    Acceder al módulo
                </a>
            </div>

            <!-- Puedes agregar más módulos aquí en el futuro -->
        </div>
    </main>
</body>
</html>