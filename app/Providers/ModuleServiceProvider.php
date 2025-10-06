<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    protected $modules = [
        'blog' => [
            'name' => 'Blog',
            'route' => 'posts.index',
            'icon' => '📝',
            'description' => 'Sistema de artículos y páginas web',
            'is_public' => true, // Define si aparece en la página pública
            'requires_auth' => false, // Define si requiere autenticación para acceder
        ],
        // Futuros módulos:
        // 'contact' => ['is_public' => true, 'requires_auth' => false],
        // 'admin' => ['is_public' => false, 'requires_auth' => true],
    ];

    public function register()
    {
        $this->app->singleton('modules', function () {
            return collect($this->modules);
        });
    }

    public function boot()
    {
        //
    }
}