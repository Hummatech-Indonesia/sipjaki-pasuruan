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
            RoleSeeder::class,
            UserSeeder::class,
            RuleCategorySeeder::class,
            FundSourceSeeder::class,
            ContractCategorySeeder::class,
            TrainingMethodSeeder::class,
            ClassificationSeeder::class
        ]);
    }
}
