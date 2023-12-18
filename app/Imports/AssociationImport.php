<?php

namespace App\Imports;

use App\Helpers\ImportAssociationHelper;
use App\Traits\AssociationTrait;
use App\Traits\ValidationAssociationTrait;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AssociationImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        ImportAssociationHelper::import([
            'name' => $row['nama'],
            'email' => $row['email'],
            'email_leader' => $row['email_ketua_asosiasi'],
            'address' => $row['alamat'],
            'city' => $row['kota'],
            'postal_code' => $row['kode_pos'],
            'phone_number' => $row['nomor_hp'],
            'leader' => $row['nama_ketua'],
            'address_leader' => $row['alamat_ketua'],
            'phone_number_leader' => $row['nomor_hp_ketua'],
        ]);
    }

    use ValidationAssociationTrait;
}
