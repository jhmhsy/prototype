<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateStaffUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use firstOrCreate to avoid duplicate entries
        $staff = User::firstOrCreate(
            ['email' => 'staff@gmail.com'], // Check for existing user by email
            [
                'name' => 'Staff',
                'password' => bcrypt(value: 'gymonestaff'), // Use a secure password
                'email_verified_at' => now(), // Set email as verified
            ]
        );

        // Create the Staff role if it doesn't exist
        $staffRole = Role::firstOrCreate(['name' => 'Staff']);

        // Define permissions specific to Staff role
        $permissions = [
            'is-admin',
            'is-super',
            'overview-list'
        ];
        $staffRole->syncPermissions($permissions);

        // Assign the role to the user
        $staff->assignRole($staffRole);
    }
}