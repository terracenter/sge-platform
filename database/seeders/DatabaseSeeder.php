<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles and permissions first
        $this->call([
            RolePermissionSeeder::class,
        ]);

        // Create user and assign role
        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@sgeplatform.com',
        ]);
        
        $user->assignRole('super-admin');

        // Execute module seeders
        $this->call([
            \Blog\Database\Seeders\PostSeeder::class,
        ]);
    }
}