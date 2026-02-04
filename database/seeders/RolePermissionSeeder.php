<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions =
            [
                'view-users',
                'create-users',
                'edit-users',
                'delete-users',
                'view-products',
                'create-products',
                'edit-products',
                'delete-products',
                'view-orders',
                'create-orders',
                'edit-orders',
                'delete-orders'
            ];
        foreach ($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);
        $customer = Role::create(['name' => 'customer']);

        $admin -> givePermissionTo(Permission::all());
        $manager -> givePermissionTo([
            'view-products',
            'create-products',
            'edit-products',
            'view-orders',
            'edit-orders',
        ]);
        $customer->givePermissionTo([
            'view-products',
            'create-orders',
            'view-orders',
        ]);
        $user = User::find(1);
        if($user)
        {
            $user -> assignRole('admin');
        }
    }
}
