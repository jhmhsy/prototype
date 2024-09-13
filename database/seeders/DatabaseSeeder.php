<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            CreateAdminUserSeeder::class
        ]);
        User::factory()->create([
            'email' => 'user@gmail.com',
            'name' => 'user',
            'password' => 'asdasdasd'
        ]);
    }
}