<?php

namespace Database\Seeders;

use App\Models\TrainingMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            'Reguler',
            'On The Job Training',
            'Mobile Training Unit ( MTU )',
            'Distance Learning',
            'Infrastruktur Berbasis Masyarakat',
            'Lembaga Permasyarakatan',
            'Hybrid'
        ];

        foreach($methods as $method)
        {
            TrainingMethod::create([
                'name' => $method
            ]);
        }
    }
}
