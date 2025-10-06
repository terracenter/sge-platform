@extends('blog::layouts.app')

@section('title', 'Editar Post - Mi Blog')

@section('content')
{{-- Agregar esto si no está --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Editar Post</h1>
    {{-- ... resto del código ... --}}

    <form action="{{ route('posts.update', $post->slug) }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Resumen (opcional)</label>
            <textarea name="excerpt" id="excerpt" rows="3" 
                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('excerpt', $post->excerpt) }}</textarea>
            @error('excerpt')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Contenido</label>
            <textarea name="content" id="content" rows="10" 
                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="flex items-center">
                <input type="checkbox" name="published" id="published" value="1" 
                       {{ old('published', $post->published) ? 'checked' : '' }} class="mr-2">
                <label for="published" class="text-sm text-gray-700">Publicado</label>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_public" id="is_public" value="1" 
                       {{ old('is_public', $post->is_public) ? 'checked' : '' }} class="mr-2">
                <label for="is_public" class="text-sm text-gray-700">Público</label>
            </div>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('posts.show', $post->slug) }}" class="text-gray-600 hover:text-gray-900">Cancelar</a>
            <div class="space-x-2">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                    Actualizar Post
                </button>
            </div>
        </div>
    </form>

    <!-- Formulario de eliminación -->
    <div class="mt-6 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Zona peligrosa</h2>
        <form action="{{ route('posts.destroy', $post->slug) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este post?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">
                Eliminar Post
            </button>
        </form>
    </div>
</div>
@endsection