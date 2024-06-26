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
        $birthDate = $row['tanggal_lahir'] = Date::excelToDateTimeObject($row['tanggal_lahiryyyy_mm_dd'])->format('Y-m-d');

        $gender = '';
        switch($row['jenis_kelamin']){
            case 'Perempuan';
                $gender = 'female';
                break;
            case 'Laki Laki';
                $gender = 'male';
        }

        $maritalStatus = '';
        switch($row['status_nikah']){
            case 'Sudah Kawin';
                $maritalStatus = 'marry';
                break;
            case 'Belum Kawin';
                $maritalStatus = 'single';
                break;
            case 'Cerai Hidup';
                $maritalStatus = 'divorced';
                break;
            case 'Cerai Mati';
                $maritalStatus = 'death_divorced';
        }


        if(
            $row['nama'] && $row['agama'] && $row['nomor_telephone'] && $row['nik'] && $birthDate && $row['pendidikan_terakhir'] && $maritalStatus && $row['alamat']
        ){
            ImportWorkerHelper::import([
                'name' => $row['nama'],
                'religion' => $row['agama'],
                'phone_number' => $row['nomor_telephone'],
                'national_identity_number' => $row['nik'],
                'birth_date' => $birthDate,
                'education' => $row['pendidikan_terakhir'],
                'marital_status' => $maritalStatus,
                'address' => $row['alamat']
            ]);
        }
    }
}
