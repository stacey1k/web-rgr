<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            CarSeeder::class,
            NewsSeeder::class,
            PageSeeder::class,
            // TestDriveRequestSeeder::class, // временно закомментировано
            // PurchaseRequestSeeder::class,  // временно закомментировано
        ]);
    }
}