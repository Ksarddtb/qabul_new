<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            'name'=>'Administrator',
            'login'=>'admin',
            'password'=>'admin',
        ];
        $admin=User::updateOrCreate([
            'login'=>$data['login'],
        ],$data);

        $permission = Permission::create(['name' => 'Super Admin']);
        $this->addUserPermissions();
        $role = Role::create(['name' => 'Super Admin']);
        $role->givePermissionTo($permission);
        $admin->assignRole([$role->id]);
    }

    /**
     * @return void
     */
    public function addUserPermissions(): void
    {
        Permission::updateOrCreate(['name' => 'create annotation']);
        Permission::updateOrCreate(['name' => 'create applicant']);
        Permission::updateOrCreate(['name' => 'update applicant']);
        Permission::updateOrCreate(['name' => 'update2 applicant']);
        Permission::updateOrCreate(['name' => 'call applicant']);
        Permission::updateOrCreate(['name' => 'contract create']);
        Permission::updateOrCreate(['name' => 'contract update']);
        Permission::updateOrCreate(['name' => 'contract delete']);
        Permission::updateOrCreate(['name' => 'edit annotation']);
        Permission::updateOrCreate(['name' => 'create user']);
        Permission::updateOrCreate(['name' => 'edit user']);
        Permission::updateOrCreate(['name' => 'update user']);
        Permission::updateOrCreate(['name' => 'delete user']);
        Permission::updateOrCreate(['name' => 'create config']);
        Permission::updateOrCreate(['name' => 'edit config']);
        Permission::updateOrCreate(['name' => 'update config']);
        Permission::updateOrCreate(['name' => 'delete config']);
    }
}
