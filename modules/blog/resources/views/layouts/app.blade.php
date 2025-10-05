<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Blog Laravel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="{{ route('posts.index') }}" class="text-xl font-bold text-gray-800">Mi Blog</a>
                <div class="space-x-4">
                    <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-gray-900">Inicio</a>
                    <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nuevo Post</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto py-6 px-4">
            <p class="text-center text-gray-500">&copy; {{ date('Y') }} Mi Blog Laravel. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>