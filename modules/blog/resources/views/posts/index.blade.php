@extends('blog::layouts.app')

@section('title', 'Inicio - Mi Blog')

@section('content')
<div class="space-y-8">
    <h1 class="text-3xl font-bold text-gray-900">Últimos Posts</h1>
    
   @forelse($posts as $post)
<article class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-2">
        <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-blue-600">
            {{ $post->title }}
        </a>
    </h2>
    
    @if($post->excerpt)
    <p class="text-gray-600 mb-4">{{ $post->excerpt }}</p>
    @endif
    
    <div class="flex justify-between items-center text-sm text-gray-500">
        <span>Publicado el {{ $post->published_at->format('d/m/Y') }}</span>
        <div class="flex items-center space-x-2">
            <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-500 hover:text-blue-700">
                Leer más →
            </a>
            
            {{-- Botones de edición para usuarios autenticados --}}
            @auth
                @can('update', $post)
                <a href="{{ route('posts.edit', $post->slug) }}" 
                   class="text-green-500 hover:text-green-700" title="Editar">
                    ✏️
                </a>
                @endcan
            @endauth
        </div>
    </div>
</article>
@empty
<div class="bg-white rounded-lg shadow-md p-6 text-center">
    <p class="text-gray-500">No hay posts publicados aún.</p>
</div>
@endforelse

    {{ $posts->links() }}
</div>
@endsection