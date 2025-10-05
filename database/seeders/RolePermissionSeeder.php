<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permisos específicos del módulo Blog
        $permissions = [
            'blog.view',
            'blog.create',
            'blog.edit', 
            'blog.delete',
            'blog.publish',
            'blog.manage'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Crear roles y asignar permisos
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleSuperAdmin->givePermissionTo(Permission::all());

        $roleBlogAdmin = Role::create(['name' => 'blog-admin']);
        $roleBlogAdmin->givePermissionTo([
            'blog.view', 'blog.create', 'blog.edit', 'blog.delete', 'blog.publish', 'blog.manage'
        ]);

        $roleBlogEditor = Role::create(['name' => 'blog-editor']);
        $roleBlogEditor->givePermissionTo([
            'blog.view', 'blog.create', 'blog.edit', 'blog.publish'
        ]);

        $roleBlogAuthor = Role::create(['name' => 'blog-author']);
        $roleBlogAuthor->givePermissionTo([
            'blog.view', 'blog.create', 'blog.edit'
        ]);

        $roleBlogViewer = Role::create(['name' => 'blog-viewer']);
        $roleBlogViewer->givePermissionTo(['blog.view']);
    }
}