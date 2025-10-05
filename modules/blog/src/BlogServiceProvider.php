<?php

namespace Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Mensaje de debug para verificar que se carga
        \Log::info('BlogServiceProvider cargado correctamente');
        
        // Cargar vistas del módulo
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blog');
        
        // Cargar migraciones del módulo
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}