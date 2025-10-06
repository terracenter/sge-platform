@extends('blog::layouts.app')

@section('title', $post->title . ' - Mi Blog')

@section('content')
<article class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
        <div class="flex items-center text-sm text-gray-500">
            <span>Publicado el {{ $post->published_at->format('d/m/Y H:i') }}</span>
            <span class="mx-2">•</span>
            <span>Por {{ $post->user->name }}</span>
        </div>
    </header>

    @if($post->excerpt)
    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6">
        <p class="text-gray-700 italic">{{ $post->excerpt }}</p>
    </div>
    @endif

    <div class="prose max-w-none text-gray-700">
        {!! nl2br(e($post->content)) !!}
    </div>

    {{-- BOTONES DE EDICIÓN --}}
    @auth
        @if(auth()->user()->can('update', $post) || auth()->user()->can('delete', $post))
        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex space-x-4">
                @can('update', $post)
                <a href="{{ route('posts.edit', $post->slug) }}" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Editar Post
                </a>
                @endcan
                
                @can('delete', $post)
                <form action="{{ route('posts.destroy', $post->slug) }}" method="POST" 
                    onsubmit="return confirm('¿Estás seguro de que quieres eliminar este post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Eliminar Post
                    </button>
                </form>
                @endcan
            </div>
        </div>
        @endif
    @endauth

    <footer class="mt-8 pt-6 border-t">
        <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-700">
            &larr; Volver al blog
        </a>
    </footer>
</article>
@endsection