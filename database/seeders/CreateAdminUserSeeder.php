<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use firstOrCreate to avoid duplicate entries
        $admin = User::firstOrCreate(
            ['email' => 'admin@email.com'], // Check for existing user by email
            [
                'name' => 'Admin',
                'password' => bcrypt('asdasdasd'), // Use a secure password
                'email_verified_at' => now(), // You might want to set this if needed
            ]
        );

        // Create the Admin role if it doesn't exist
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // Retrieve all permissions and sync them with the role
        //Limited permissions
        $permissions = [
            'is-admin',
            'is-user',
            'overview-list'
        ];
        $adminRole->syncPermissions($permissions);

        // Assign the role to the user
        $admin->assignRole($adminRole);
    }
}