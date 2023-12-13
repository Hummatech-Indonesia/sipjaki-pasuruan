<?php

namespace Database\Seeders;

use App\Models\ContractCategory;
use Illuminate\Database\Seeder;

class ContractCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Harga Satuan',
            'Lump Sum',
            'Turn Key',
            'Gabungan Lump Sum Dan Harga Satuan'
        ];

        foreach($categories as $category)
        {
            ContractCategory::create([
                'name' => $category
            ]);
        }
    }
}
