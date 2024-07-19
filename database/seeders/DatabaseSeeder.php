<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //seed all data to database
        $this->call([
            RolePermissionSeeder::class,
            EquipmentSeeder::class
        ]);
    }
}
