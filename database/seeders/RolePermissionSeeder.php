<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions using firstOrCreate
        $permissions = [
            // Product permissions
            'create products',
            'edit products',
            'delete products',
            'view products',

            // Order permissions
            'create orders',
            'view orders',
            'update order status',
            'view all orders',

            // User permissions
            'manage users',
            'manage roles',

            // Review permissions
            'create reviews',
            'delete reviews',
            'moderate reviews',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        // Create roles using firstOrCreate and sync permissions
        $customer = Role::firstOrCreate([
            'name' => 'customer',
            'guard_name' => 'web'
        ]);
        $customer->syncPermissions([
            'view products',
            'create orders',
            'view orders',
            'create reviews',
        ]);

        $seller = Role::firstOrCreate([
            'name' => 'seller',
            'guard_name' => 'web'
        ]);
        $seller->syncPermissions([
            'create products',
            'edit products',
            'delete products',
            'view products',
            'view orders',
            'update order status',
        ]);

        $moderator = Role::firstOrCreate([
            'name' => 'moderator',
            'guard_name' => 'web'
        ]);
        $moderator->syncPermissions([
            'view products',
            'delete reviews',
            'moderate reviews',
        ]);

        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);
        $admin->syncPermissions(Permission::all());
    }
}
