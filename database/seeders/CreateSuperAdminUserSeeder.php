<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateSuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $superAdmins = [
            // for developer 
            [
                'name' => 'Production Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('gymoneadmin'),
                'email_verified_at' => now(),
            ],
            // for gym owner
            [
                'name' => 'Gym Admin',
                'email' => 'gymadmin@gmail.com',
                'password' => bcrypt('gymoneadmin'),
                'email_verified_at' => now(),
            ],
        ];

        $superAdminRole = Role::firstOrCreate(['name' => 'SuperAdmin']);

        $permissions = Permission::pluck('id', 'id')->all();
        $superAdminRole->syncPermissions($permissions);

        foreach ($superAdmins as $adminData) {
            $superAdmin = User::firstOrCreate(['email' => $adminData['email']], $adminData);
            $superAdmin->assignRole($superAdminRole);
        }


    }
}