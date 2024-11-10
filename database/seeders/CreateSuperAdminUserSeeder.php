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
                'name' => 'Super Admin 1',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('asdasdasd'),
                'email_verified_at' => now(),
            ],
            // for gym owner
            [
                'name' => 'Super Admin 2',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('gym-owners password here'),
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