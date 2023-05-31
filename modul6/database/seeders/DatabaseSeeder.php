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
        // akan memanggil position seeder dan employee seeder
        $this->call([
            PositionSeeder::class,
            EmployeeSeeder::class
        ]);
    }
}
