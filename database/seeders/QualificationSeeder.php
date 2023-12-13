<?php

namespace Database\Seeders;

use App\Models\Qualification;
use Faker\Provider\Uuid;
use Illuminate\Database\Seeder;

class QualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $qualifications = [
            'Operator',
            'Teknisi',
            'Ahli',
            'Analis',
            'Bangunan',
        ];

        foreach($qualifications as $qualification)
        {
            $qualification = Qualification::create([
                'name' => $qualification
            ]);

            $qualification->qualificationLevels()->insert([
                [
                    'id' => Uuid::uuid(),
                    'name' => 'Jenjang 1',
                ],
                [
                    'id' => Uuid::uuid(),
                    'name' => 'Jenjang 2',
                ],
                [
                    'id' => Uuid::uuid(),
                    'name' => 'Jenjang 3',
                ],
            ]);
        }
    }
}
