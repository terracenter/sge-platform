<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear o actualizar usuario admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'admin',
                'password' => bcrypt('sge2020$'),
                'email_verified_at' => now(),
            ]
        );

        // Asignar rol super-admin
        $admin->assignRole('super-admin');
    }
}