<?php

use Blog\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::resource('posts', PostController::class)->only([
    'index', 'show', 'create', 'store'
]);

Route::get('/posts/{slug}', [PostController::class, 'show'])
    ->name('posts.show');