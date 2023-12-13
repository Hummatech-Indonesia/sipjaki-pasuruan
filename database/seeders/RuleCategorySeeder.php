<?php

namespace Database\Seeders;

use App\Models\RuleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'PERATURAN DAERAH',
            'PERATURAN GUBERNUR',
            'PERATURAN BUPATI/WALIKOTA',
            'SURAT EDARAN',
            'KEPUTUSAN GUBERNUR',
            'KEPUTUSAN BUPATI/WALIKOTA',
            'REFERENSI'
        ];

        foreach($categories as $category)
        {
            RuleCategory::create([
                'name' => $category
            ]);
        }
    }
}
