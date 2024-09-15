<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $superAdmin = User::factory()->create([
            'name' => 'Super Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('asdasdasd')
        ]);
        
        $superAdminRole = Role::create(['name' => 'SuperAdmin']);
        //dinhi mn ata dapat mag create ug role, nya ang permissions niya is naka depende
        $permissions = Permission::pluck('id','id')->all();
        $superAdminRole->syncPermissions($permissions);
        $superAdmin->assignRole($superAdminRole);

    }
}