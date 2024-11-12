<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use firstOrCreate to avoid duplicate entries
        $user = User::firstOrCreate(
            ['email' => 'user@gmail.com'], // Check for existing user by email
            [
                'name' => 'User',
                'password' => bcrypt('asdasdasd'), // Secure password
                'email_verified_at' => now(), // Set verified date if needed
            ]
        );

        // Create the User role if it doesn't exist
        $userRole = Role::firstOrCreate(['name' => 'User']);

        // Assign the role to the user
        $user->assignRole($userRole);
    }
}