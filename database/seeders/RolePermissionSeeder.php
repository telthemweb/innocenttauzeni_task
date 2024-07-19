<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionslist=[
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view users',
            'create user',
            'edit user',
            'delete user',
            'view equipments',
            'edit equipment',
            'delete equipment',
            'assign equipment',
            'unasign equipment',
            'record equipments',
        ];

        foreach($permissionslist as $permission){
            Permission::create(['name'=>$permission]);
        }


        $superAdmin = Role::create([
            'name' => 'Super Admin',
        ]);

        $companyAdmin = Role::create([
            'name' => 'Company Admin',
        ]);

        $regularUser = Role::create([
            'name' => 'Regular User',
        ]);
        $superAdmin->givePermissionTo(Permission::all());
        $companyAdmin->givePermissionTo([
            'view users',
            'view equipments',
            'record equipments',
            'edit equipment',
            'delete equipment',
            'assign equipment',
            'unasign equipment',
        ]);
        $regularUser->givePermissionTo([
            'record equipments',
            'view equipments',
        ]);



        $superAdminuser =  User::create([
            'name' => 'Innocent Tauzeni',
            'phone' => '0774914150',
            'email' => 'itauzeni@genesis.co.zw',
            'gender' => 'Male',
            'password' => Hash::make('!physmach89')
        ]);
        $superAdminuser->assignRole($superAdmin);

        $companyAdminuser =  User::create([
            'name' => 'Keryleen Adael',
            'phone' => '0719914150',
            'email' => 'keryleenadael@genesis.co.zw',
            'gender' => 'Female',
            'password' => Hash::make('!adael1234@')
        ]);
        $companyAdminuser->assignRole($companyAdmin);

        $regularUseraccount =  User::create([
            'name' => 'Andile Jamu',
            'phone' => '0774482844',
            'email' => 'ajamu@genesis.co.zw',
            'gender' => 'Male',
            'password' => Hash::make('!Andilejamu@#')
        ]);
        $regularUseraccount->assignRole($regularUser);
    }
}
