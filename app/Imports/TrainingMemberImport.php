<?php

namespace App\Imports;

use App\Helpers\ImportTrainingMemberHelper;
use App\Models\Training;
use App\Traits\ValidationTrainingMemberTrait;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TrainingMemberImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * model
     *
     * @param  mixed $row
     * @return void
     */
    public function model(array $row)
    {
        $training = Training::query()->where('name', $row['pelatihan'])->first();
        if (strtolower($row['jenis_kelamin']) == "laki-laki" || strtolower($row['jenis_kelamin']) == "male") {
            $gender = "male";
        } else {
            $gender = "female";
        }
        ImportTrainingMemberHelper::import([
            'training_id' =>  $training['id'],
            'name' => $row['nama'],
            'position' => $row['posisi'],
            'address' => $row['alamat'],
            'phone_number' => $row['nomor_telepon'],
            'decree' => $row['surat_keputusan'],
            'gender' => $gender,
            'national_identity_number' => $row['nik'],
            'education' => $row['edukasi']
        ]);
    }

    use ValidationTrainingMemberTrait;
}
