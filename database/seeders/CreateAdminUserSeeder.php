<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the admin user directly without using the factory
        $admin = User::create([
            'name' => 'Admin', 
            'email' => 'admin@email.com',
            'password' => bcrypt('asdasdasd')
        ]);

        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'is-admin',
        ];

        $permissions = Permission::whereIn('name', $permissions)
            ->pluck('id', 'id')
            ->all();

        $adminRole->syncPermissions($permissions);
        $admin->assignRole($adminRole);
    }
}