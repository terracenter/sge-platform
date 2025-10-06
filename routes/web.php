<?php

use Blog\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Rutas públicas de blog
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Rutas protegidas de blog (requieren autenticación) - DEBEN IR PRIMERO
Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

// RUTA CON PARÁMETRO DEBE IR AL FINAL
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

// Ruta de prueba
Route::get('/test-posts', function () {
    return 'TEST: Ruta de posts funciona';
});

require __DIR__.'/auth.php';

// Inicio - AL FINAL para que no interfiera con otras rutas
Route::get('/', function () {
    $publicModules = collect(config('modules'))->filter(function ($module) {
        return $module['is_public'] === true;
    });
    
    return view('welcome', compact('publicModules'));
});

// Dashboard (protegido)
Route::get('/dashboard', function () {
    $modules = config('modules');
    return view('dashboard', compact('modules'));
})->name('dashboard')->middleware('auth');