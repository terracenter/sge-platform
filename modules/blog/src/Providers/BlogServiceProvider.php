<?php

namespace Blog\Providers;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        
        // AGREGAR ESTA LÍNEA:
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'blog');
    }
}