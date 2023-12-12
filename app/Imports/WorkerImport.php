<?php

namespace App\Imports;

use App\Helpers\ImportWorkerHelper;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WorkerImport implements ToModel, WithHeadingRow
{
    /**
     * model
     *
     * @param  mixed $row
     * @return void
     */
    public function model(array $row)
    {
        $birthDate = $row['tanggal_lahir'] = Date::excelToDateTimeObject($row['tanggal_lahir'])->format('Y-m-d');

        ImportWorkerHelper::import([
            'name' => $row['nama'],
            'birth_date' => $birthDate,
            'education' => $row['edukasi'],
            'registration_number' => $row['nomor_registrasi'],
            'cerificate' => $row['jumlah_sertfikat'],
        ]);
    }
}
