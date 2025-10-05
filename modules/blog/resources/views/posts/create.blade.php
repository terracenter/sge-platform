@extends('blog::layouts.app')

@section('title', 'Crear Nuevo Post - Mi Blog')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Crear Nuevo Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
            <input type="text" name="title" id="title" required
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="{{ old('title') }}">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Resumen (opcional)</label>
            <textarea name="excerpt" id="excerpt" rows="3"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('excerpt') }}</textarea>
            @error('excerpt')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Contenido</label>
            <textarea name="content" id="content" required rows="10"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="published" class="flex items-center space-x-2">
                <input type="checkbox" name="published" id="published" value="1" {{ old('published') ? 'checked' : '' }}
                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <span class="text-sm font-medium text-gray-700">Publicar inmediatamente</span>
            </label>
            @error('published')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('posts.index') }}" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50">
                Cancelar
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Publicar Post
            </button>
        </div>
    </form>
</div>
@endsection