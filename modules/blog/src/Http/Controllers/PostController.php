<?php

namespace Blog\Http\Controllers;

use App\Http\Controllers\Controller; 
use Blog\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::where('published', true)
                    ->where('published_at', '<=', now())
                    ->orderBy('published_at', 'desc')
                    ->paginate(10);
        
        return view('blog::posts.index', compact('posts'));
    }

    public function show(string $slug): View
    {
        $post = Post::where('slug', $slug)
                    ->where('published', true)
                    ->where('published_at', '<=', now())
                    ->firstOrFail();
        
        return view('blog::posts.show', compact('post'));
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500'
        ]);

        $post = Post::create([
            ...$validated,
            'user_id' => auth()->id(),
            'published' => true,
            'published_at' => now()
        ]);

        return redirect()->route('posts.show', $post->slug);
    }
}