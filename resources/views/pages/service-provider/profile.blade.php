@extends('layouts.app')
@section('content')
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <div class="d-flex">
            <a class="nav-link active rounded-start" style="border: solid 1px #1B3061;" id="badan-usaha-tab"
                data-bs-toggle="pill" href="#badan-usaha" role="tab" aria-controls="badan-usaha" aria-selected="true">
                <div class="fw-bold">Badan Usaha</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" id="kualifikasi-klasifikasi-tab" data-bs-toggle="pill"
                href="#kualifikasi-klasifikasi" role="tab" aria-controls="kualifikasi-klasifikasi"
                aria-selected="false">
                <div class="fw-bold">Kualifikasi dan Klasifikasi</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" id="administrasi-tab" data-bs-toggle="pill"
                href="#administrasi" role="tab" aria-controls="administrasi" aria-selected="false">
                <div class="fw-bold">Administrasi</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" id="pengurus-tab" data-bs-toggle="pill" href="#pengurus"
                role="tab" aria-controls="pengurus" aria-selected="false">
                <div class="fw-bold">Pengurus</div>
            </a>
            <a class="nav-link" style="border: solid 1px #1B3061;" id="tenaga-kerja-tab" data-bs-toggle="pill"
                href="#tenaga-kerja" role="tab" aria-controls="tenaga-kerja" aria-selected="false">
                <div class="fw-bold">Tenaga Kerja</div>
            </a>
            <a class="nav-link rounded-end" style="border: solid 1px #1B3061;" id="pengalaman-tab" data-bs-toggle="pill"
                href="#pengalaman" role="tab" aria-controls="pengalaman" aria-selected="false">
                <div class="fw-bold">Pengalaman</div>
            </a>
        </div>
    </div>

    <div class="tab-content mt-4" id="v-pills-tabContent">
        <div class="tab-pane fade active show" id="badan-usaha" role="tabpanel" aria-labelledby="badan-usaha-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Badan Usaha
                                </div>
                                <p class="fw-bolder fs-4">MITRA BAHAGIA UTAMA BUMIAJI</p>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 50%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>Jl. G. Lokon No. 59</td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten</td>
                                        <td>:</td>
                                        <td>Kota Malang</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos</td>
                                        <td>:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>0411 - 3584897987</td>
                                    </tr>
                                    <tr>
                                        <td>Fax</td>
                                        <td>:</td>
                                        <td>0411 - 3584897987</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>mitrabahagia@yhooo.com</td>
                                    </tr>
                                    <tr>
                                        <td>Website</td>
                                        <td>:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Bentuk Badan Usaha</td>
                                        <td>:</td>
                                        <td>PT</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Badan Usaha</td>
                                        <td>:</td>
                                        <td>Pelaksanaan</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="kualifikasi-klasifikasi" role="tabpanel"
            aria-labelledby="kualifikasi-klasifikasi-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Kualifikasi / Klasifikasi Badan Usaha
                                </div>
                                <p class="fw-bolder fs-4">MITRA BAHAGIA UTAMA BUMIAJI</p>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>Jl. G. Lokon No. 59</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>0411 - 3584897987</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive rounded-4">
                <table class="table table-bordered" border="1">
                    <thead>
                        <tr align="center">
                            <th style="background-color: #1B3061;color:#ffffff; vertical-align: middle" rowspan="2">No
                            </th>
                            <th style="background-color: #1B3061;color:#ffffff; vertical-align: middle" colspan="1" rowspan="2">Sub Bidang Klasifikasi/Layanan</th>
                            <th style="background-color: #1B3061;color:#ffffff; vertical-align: middle" colspan="1" rowspan="2">Nomor Kode</th>
                            <th style="background-color: #1B3061;color:#ffffff; vertical-align: middle" colspan="1" rowspan="2">Kualifikasi</th>
                            <th colspan="1" style="background-color: #1B3061;color:#ffffff;">Kemampuan Dasar</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle" rowspan="2" colspan="1">
                                Asosiasi</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Tanggal Permohonan</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Tanggal Cetak Pertama</th>
                            <th style="background-color: #1B3061;color:#ffffff;vertical-align: middle;width:150px;"
                                rowspan="2" colspan="1">Tanggal Cetak Perubahan Terakhir</th>
                        </tr>
                        <tr align="center">
                            <th style="background-color: #1B3061;color:#ffffff;">Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="center">
                            <td colspan="1">1</td>
                            <td colspan="1">Jasa Pelaksanaa Untuk Konstruksi Saluran Air</td>
                            <td colspan="1">SI001</td>
                            <td colspan="1">M2</td>
                            <td colspan="1">2023</td>
                            <td colspan="1">GAPENSI</td>
                            <td colspan="1">2021-10-21</td>
                            <td colspan="1">2021-10-21</td>
                            <td colspan="1">2021-10-21</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="administrasi" role="tabpanel" aria-labelledby="administrasi-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Administrasi
                                </div>
                                <p class="fw-bolder fs-4">MITRA BAHAGIA UTAMA BUMIAJI</p>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>Jl. G. Lokon No. 59</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>0411 - 3584897987</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mt-3 mb-3 fw-bold">Akte Pendiri</h4>
            <div class="card rounded-bottom-4" style="border: 1px solid black;border-radius: 20px 20px 20px 20px;">
                <h5 class="card-header text-center border-bottom text-uppercase rounded-top-4 p-3"
                    style="background-color: #1B3061;color:white;">Akte Pendiri</h5>
                <div class="card-body">
                    <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                        <tbody>
                            <tr>
                                <td>No</td>
                                <td>:</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>Nama Notaris</td>
                                <td>:</td>
                                <td>Taufiq Arifin. SH</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>JL Haji Puniti</td>
                            </tr>
                            <tr>
                                <td>Kota / Kabupaten</td>
                                <td>:</td>
                                <td>Kota Malang</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td>Jawa Timur</td>
                            </tr>
                            <tr>
                                <td>Tanggal Akte</td>
                                <td>:</td>
                                <td>08 Januari</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h4 class="mt-3 mb-3 fw-bold">Pengesahan</h4>
            <div class="table-responsive rounded-4">
                <table class="table table-bordered" border="1">
                    <thead>
                        <tr align="center">
                            <th colspan="2" style="background-color: #1B3061;color:#ffffff;">Materi Kehakiman dan HAM
                            </th>
                            <th colspan="2" style="background-color: #1B3061;color:#ffffff;">Pengadilan Negeri</th>
                            <th colspan="2" style="background-color: #1B3061;color:#ffffff;">Lembar Negara</th>

                        </tr>
                        <tr align="center">
                            <th style="background-color: #1B3061;color:#ffffff;">Nomor</th>
                            <th style="background-color: #1B3061;color:#ffffff;">Tanggal</th>
                            <th style="background-color: #1B3061;color:#ffffff;">Nomor</th>
                            <th style="background-color: #1B3061;color:#ffffff;">Tanggal</th>
                            <th style="background-color: #1B3061;color:#ffffff;">Nomor</th>
                            <th style="background-color: #1B3061;color:#ffffff;">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="center">
                            <td>No Akte</td>
                            <td>22 Maret 2023</td>
                            <td>-</td>
                            <td>22 Maret 2023</td>
                            <td>-</td>
                            <td>22 Maret 2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="mt-3 mb-3 fw-bold">Akte Perubahan</h4>
            <div class="table-responsive rounded-4">
                <table class="table table-bordered" border="1">
                    <thead>
                        <tr>
                            <th class="text-white" style="background-color: #1B3061">
                                No Akte
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Nama Notaris
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Alamat
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Kota / Kabupaten
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Provinsi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10</td>
                            <td>Tuafiq Arifin, SH</td>
                            <td>Jl. Singa No 4</td>
                            <td>Kota Malang</td>
                            <td>Jawa Timur</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="pengurus" role="tabpanel" aria-labelledby="pengurus-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Pengurus Badan Usaha
                                </div>
                                <p class="fw-bolder fs-4">MITRA BAHAGIA UTAMA BUMIAJI</p>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>Jl. G. Lokon No. 59</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>0411 - 3584897987</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive rounded-4 mt-4">
                <table class="table table-bordered" border="1">
                    <thead>
                        <tr>
                            <th class="text-white" style="background-color: #1B3061">
                                No
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Nama
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Tanggal Lahir
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Alamat
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Jabatan
                            </th>
                            <th class="text-white" style="background-color: #1B3061">
                                Pendidikan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tuafiq Arifin, SH</td>
                            <td>Jl. Singa No 4</td>
                            <td>Kota Malang</td>
                            <td>Jawa Timur</td>
                            <td>Jawa Timur</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="tenaga-kerja" role="tabpanel" aria-labelledby="tenaga-kerja-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Pengurus Badan Usaha
                                </div>
                                <p class="fw-bolder fs-4">MITRA BAHAGIA UTAMA BUMIAJI</p>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>Jl. G. Lokon No. 59</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>0411 - 3584897987</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive rounded-4">
                        <table class="table table-bordered" border="1">
                            <thead>
                                <tr>
                                    <th class="text-white" style="background-color: #1B3061">
                                        No
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        Nama
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        Tanggal Lahir
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        Pendidikan
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        No Registrasi
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        Jenis Sertifikat
                                    </th>
                                    <th class="text-white" style="background-color: #1B3061">
                                        Detail
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Tuafiq Arifin, SH</td>
                                    <td>Jl. Singa No 4</td>
                                    <td>Kota Malang</td>
                                    <td>Jawa Timur</td>
                                    <td>1231457</td>
                                    <td><button class="btn btn-sm rounded-3"
                                            style="background-color: #1B3061;color:white;"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg> Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pengalaman" role="tabpanel" aria-labelledby="pengalaman-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    Data Pengurus Badan Usaha
                                </div>
                                <p class="fw-bolder fs-4">MITRA BAHAGIA UTAMA BUMIAJI</p>
                            </div>
                            <table cellpadding="5" style="border-collapse: collapse; width: 40%;" class="fs-6 fw-normal">
                                <tbody>
                                    <tr>
                                        <td>Alamat Badan Usaha</td>
                                        <td>:</td>
                                        <td>Jl. G. Lokon No. 59</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>0411 - 3584897987</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mt-3 mb-3 fw-bold">Pengesahan</h4>
            <div class="table-responsive rounded-4">
                <table class="table table-bordered">
                    <thead>
                        <tr align="center">
                            <th style="background-color: #1B3061; color: #ffffff; vertical-align: middle" colspan="1" rowspan="2">No</th>
                            <th colspan="3" style="background-color: #1B3061; color: #ffffff;">Proyek</th>
                            <th style="background-color: #1B3061; color: #ffffff; vertical-align: middle" colspan="1" rowspan="2">Pemberi Tugas</th>
                            <th style="background-color: #1B3061; color: #ffffff; vertical-align: middle" colspan="1" rowspan="2">Sub Bidang Kualifikasi</th>
                            <th colspan="3" style="background-color: #1B3061; color: #ffffff;">Nomor</th>
                            <th colspan="4" style="background-color: #1B3061; color: #ffffff;">Tanggal</th>
                        </tr>
                        <tr align="center">
                            <th style="background-color: #1B3061; color: #ffffff;">Tahun</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Nama</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Nama Rupiah (dalam Ribuan)</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Kontrak</th>
                            <th style="background-color: #1B3061; color: #ffffff;">NKPK</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Berita Acara Serah Terima</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Berita Acara Serah Terima</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Kontrak</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Mulai</th>
                            <th style="background-color: #1B3061; color: #ffffff;">Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="center">
                            <td colspan="1">1</td>
                            <td colspan="1">2023</td>
                            <td colspan="1">Peningkatan Jalan Laston Paket VI Kab. Bulukumba</td>
                            <td colspan="1">123132456478</td>
                            <td colspan="1">S1</td>
                            <td colspan="1">SI0084</td>
                            <td colspan="1">1</td>
                            <td colspan="1">06/SPK/Laston/PPK/DBM/III/2015</td>
                            <td colspan="1">02/PHO/Laston-Dau/DBM/IX/2015</td>
                            <td colspan="1">02/PHO/Laston-Dau/DBM/IX/2015</td>
                            <td colspan="1">25 Juni 2023</td>
                            <td colspan="1">25 Juni 2023</td>
                            <td colspan="1">25 Juni 2023</td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
