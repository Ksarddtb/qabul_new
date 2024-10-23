<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $role = Role::create(['name' => 'Super Admin']);
        $role->givePermissionTo($permission);
        $admin->assignRole([$role->id]);
    }
}
