<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Registrar migraciones del módulo blog
        $this->loadMigrationsFrom(__DIR__.'/../../modules/blog/src/Database/migrations');
        
        // Registrar vistas del módulo blog con namespace 'blog'
        $this->loadViewsFrom(__DIR__.'/../../modules/blog/resources/views', 'blog');
    }
}