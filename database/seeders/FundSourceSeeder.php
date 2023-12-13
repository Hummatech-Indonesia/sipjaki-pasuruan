<?php

namespace Database\Seeders;

use App\Models\FundSource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FundSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sources = [
            'APBD Prov',
            'Asosiasi',
            'Perguruan Tinggi',
            'APBD Provinsi kerjasama dengan asosiasi',
            'APBD Provinsi kerjasama dengan lainnya',
            'APBD KAB/KOTA',
            'APBD KAB/KOTA kerjasama dengan asosiasi',
            'APBD KAB/KOTA kerjasama dengan lainnya',
            'DAU',
            'DBHP',
            'DAK',
            'DBHCHT',
            'BLUD',
            'APBN',
            'masyarakat/swasta/badan usaha'
        ];

        foreach($sources as $source)
        {
            FundSource::create([
                'name' => $source
            ]);
        }
    }
}
