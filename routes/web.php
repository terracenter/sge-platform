<?php

use Blog\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Rutas públicas de blog
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

// Rutas protegidas de blog (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

// Ruta de prueba
Route::get('/test-posts', function () {
    return 'TEST: Ruta de posts funciona';
});

require __DIR__.'/auth.php';

// Inicio - AL FINAL para que no interfiera con otras rutas
Route::get('/', function () {
    return view('welcome');
});