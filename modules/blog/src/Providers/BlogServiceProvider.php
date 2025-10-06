<?php
// modules/blog/src/Providers/BlogServiceProvider.php

namespace Blog\Providers; // 👈 Debe ser la segunda línea, sin nada intermedio

use Illuminate\Support\ServiceProvider;
use Blog\Policies\PostPolicy;
use Blog\Models\Post;
use Illuminate\Support\Facades\Gate;

class BlogServiceProvider extends ServiceProvider
{
    // Resuelve la redirección a /dashboard (Autorización)
    protected $policies = [
        Post::class => PostPolicy::class,
    ];
    
    public function boot()
    {
        // 1. Registro de Policies
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }

        // 2. Carga de Vistas (Resuelve 'No hint path defined for [blog]')
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'blog');
        
        // 3. Carga de Rutas
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    }

    public function register()
    {
        // Lo dejamos limpio
    }
}