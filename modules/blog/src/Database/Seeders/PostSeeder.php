<?php

namespace Blog\Database\Seeders; 

use Blog\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        $posts = [
            [
                'title' => 'Bienvenido a Mi Blog con Laravel',
                'content' => 'Este es el primer post de nuestro blog construido con Laravel 12 y PostgreSQL 18. En este blog podrás crear y publicar artículos de manera sencilla.',
                'excerpt' => 'Descubre las características de nuestro nuevo blog construido con las últimas tecnologías.',
                'published' => true,
                'published_at' => now(),
                'user_id' => $user->id,
            ],
            [
                'title' => 'Ventajas de usar PostgreSQL con Laravel',
                'content' => 'PostgreSQL ofrece características avanzadas como JSONB, consultas complejas y excelente rendimiento. Perfecto para aplicaciones Laravel que requieren robustez y escalabilidad.',
                'excerpt' => 'Exploramos por qué PostgreSQL es una excelente elección para tus proyectos Laravel.',
                'published' => true,
                'published_at' => now()->subDay(),
                'user_id' => $user->id,
            ],
            [
                'title' => 'Docker Sail para desarrollo local',
                'content' => 'Laravel Sail simplifica el desarrollo local con Docker. Con contenedores preconfigurados para PostgreSQL, Redis y más, puedes tener tu entorno listo en minutos.',
                'excerpt' => 'Cómo Sail facilita el desarrollo con Docker en proyectos Laravel.',
                'published' => true,
                'published_at' => now()->subDays(2),
                'user_id' => $user->id,
            ]
        ];

        foreach ($posts as $post) {
            Post::create([
                ...$post,
                'slug' => Str::slug($post['title'])
            ]);
        }
    }
}