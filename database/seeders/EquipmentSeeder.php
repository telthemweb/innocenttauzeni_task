<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Equipment;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create test data 
        Equipment::create([
            'name' => 'Laptop',
            'type' => 'Electronics',
            'model' => 'Dell XPS 13',
            'availability' => 'Available',
            'status' => true,
        ]);

        Equipment::create([
            'name' => 'Hp Laptop',
            'type' => 'Electronics',
            'model' => 'HP Laptop C250 Corei7',
            'availability' => 'Available',
            'status' => true,
        ]);

        Equipment::create([
           'name' => 'Iphone 14 Promax Tablet',
            'type' => 'Electronics',
            'model' => 'Iphone 14 Promax Tablet 2023 Version 200',
            'availability' => 'Available',
            'status' => true,
        ]);

        Equipment::create([
            'name' => 'All in One Desktop Dell',
             'type' => 'Electronics',
             'model' => 'All in One Desktop Dell Corei7 12th Generation',
             'availability' => 'Available',
             'status' => true,
         ]);
    }
}
