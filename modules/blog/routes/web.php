<?php

use Blog\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Rutas PÚBLICAS del módulo blog
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

// Rutas PROTEGIDAS del módulo blog
Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{slug}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{slug}', [PostController::class, 'destroy'])->name('posts.destroy');
});