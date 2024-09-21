<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::factory()->create([
            'email' => 'user@gmail.com',
            'name' => 'User',
            'password' => bcrypt('asdasdasd'),
        ]);
        $userRole = Role::firstOrCreate(['name' => 'User']);
        $user->assignRole($userRole);
    }
}
