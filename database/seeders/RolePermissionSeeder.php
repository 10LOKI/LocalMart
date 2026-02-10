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

        // Create permissions
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
            Permission::create(['name' => $permission]);
        }

      
        $customer = Role::create(['name' => 'customer']);
        $customer->givePermissionTo([
            'view products',
            'create orders',
            'view orders',
            'create reviews',
        ]);

        
        $seller = Role::create(['name' => 'seller']);
        $seller->givePermissionTo([
            'create products',
            'edit products',
            'delete products',
            'view products',
            'view orders',
            'update order status',
        ]);


        $moderator = Role::create(['name' => 'moderator']);
        $moderator->givePermissionTo([
            'view products',
            'delete reviews',
            'moderate reviews',
        ]);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
    }
}