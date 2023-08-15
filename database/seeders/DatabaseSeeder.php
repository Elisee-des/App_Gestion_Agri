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
        $this->call([
            UserSeeder::class,
            PaysSeeder::class,
            RegionSeeder::class,
            ProvinceSeeder::class,
            FaitiereSeeder::class,
            GroupementSeeder::class,
            ProducteurSeeder::class,
            ProductionSeeder::class,
        ]);
      
    }
}
