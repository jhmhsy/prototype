<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call([
            PermissionTableSeeder::class,
            CreateSuperAdminUserSeeder::class,
            CreateStaffUserSeeder::class,
            PriceSeeder::class,
        ]);

        // Create User role
        $userRole = Role::firstOrCreate(['name' => 'User']);
    }
}