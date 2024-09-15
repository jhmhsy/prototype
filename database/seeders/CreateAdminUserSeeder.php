<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        $admin = User::factory()->create([
            'name' => 'Admin', 
            'email' => 'admin@email.com',
            'password' => bcrypt('asdasdasd')
        ]);
        $adminRole = Role::create(['name' => 'Admin']);

        $permissions = [
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'is-admin',
        ];

        $permissions = Permission::whereIn('name', $permissions)
            ->pluck('id', 'id')
            ->all();

        $adminRole->syncPermissions($permissions);
        $admin->assignRole($adminRole);
    }
}
