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

        //system permissions
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
//now add all permission into database
        foreach($permissionslist as $permission){
            Permission::create(['name'=>$permission]);
        }

       //system rolew
        $superAdmin = Role::create([
            'name' => 'Super Admin',
        ]);

        $companyAdmin = Role::create([
            'name' => 'Company Admin',
        ]);

        $regularUser = Role::create([
            'name' => 'Regular User',
        ]);

        //assign permisson to role
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

        //assign regular role to permisson
        $regularUser->givePermissionTo([
            'record equipments',
            'view equipments',
        ]);


//create super admin
        $superAdminuser =  User::create([
            'name' => 'Innocent Tauzeni',
            'phone' => '0774914150',
            'email' => 'itauzeni@genesis.co.zw',
            'gender' => 'Male',
            'password' => Hash::make('!physmach89')
        ]);
        //assign super admin to role
        $superAdminuser->assignRole($superAdmin);


        //create company admin
        $companyAdminuser =  User::create([
            'name' => 'Keryleen Adael',
            'phone' => '0719914150',
            'email' => 'keryleenadael@genesis.co.zw',
            'gender' => 'Female',
            'password' => Hash::make('!adael1234@')
        ]);
        //assign company admin to role
        $companyAdminuser->assignRole($companyAdmin);

        //create regular user
        $regularUseraccount =  User::create([
            'name' => 'Andile Jamu',
            'phone' => '0774482844',
            'email' => 'ajamu@genesis.co.zw',
            'gender' => 'Male',
            'password' => Hash::make('!Andilejamu@#')
        ]);
        //assign regular user to role
        $regularUseraccount->assignRole($regularUser);
    }
}
