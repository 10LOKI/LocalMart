<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Define the core users for your application
        $users = [
            [
                'name'     => 'Admin User',
                'email'    => 'admin@example.com',
                'role'     => 'admin',
            ],
            [
                'name'     => 'Seller User',
                'email'    => 'seller@example.com',
                'role'     => 'seller',
            ],
            [
                'name'     => 'Moderator User',
                'email'    => 'moderator@example.com',
                'role'     => 'moderator',
            ],
            [
                'name'     => 'Customer User',
                'email'    => 'customer@example.com',
                'role'     => 'customer',
            ],
        ];

        foreach ($users as $userData) {
            // updateOrCreate checks if the email exists.
            // If yes, it updates the record. If no, it creates it.
            $user = User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name'     => $userData['name'],
                    'password' => Hash::make('password'),
                ]
            );

            // syncRoles is safer than assignRole for seeders because it
            // replaces any existing roles rather than stacking them.
            $user->syncRoles([$userData['role']]);
        }
    }
}
