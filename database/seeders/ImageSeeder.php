<?php

namespace Database\Seeders;

use App\Enums\UploadDiskEnum;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
        UploadDiskEnum::STRUCTUREORGANITATION->value,
        UploadDiskEnum::JOBANDFUNCTION->value,
        UploadDiskEnum::STRATEGICPLAN->value
        ];

        foreach($images as $image)
        {
            Image::create([
                'categories' => $image,
                'photo' => '-',
            ]);
        }
    }
}
