@extends('layouts.app-landing-page')
@section('content')
<style>
    .search-container {
    display: flex;
    align-items: center;
    position: relative;
}

.search-icon {
    margin-left: 10px;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

</style>
<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<div class="tabs-wrapper">
    <div class="section-title text-center">
        <h2 style="border-radius: 16px;
        background: var(--Kuning, #FFC928);" class="title p-2">Data Pelatihan Tenaga Ahli</h2>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-row justify-content-between align-items-center mb-3">
                        <div class="position-relative col-lg-3 search-container">
                            <input type="search" class="py-2 ps-5" id="search-name" placeholder="Search">
                            <i class="bx bx-search-alt search-icon"></i>
                        </div>
                        <select id="formrow-inputState" style="margin-right: 10px;" class="form-select col-lg-3">
                            <option disabled="" selected="">Menampilkan Data</option>
                            <option>A++</option>
                            <option>B++</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0" border="1">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-medium"
                                        style="background-color: #1B3062; color: white; border-right: 1px solid #1B3061;">
                                        No</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Nama Pelatihan</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Penangggung Jawab</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Jenis Keahlian</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Tingkat Keahlian</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Waktu Pelaksanaan</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Peserta Laki-laki</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Peserta Perempuan</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Lokasi</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <th scope="row" class="fs-5">1</th>
                                        <td>Pembekalan dan uji sertifikasi ahli muda perencana
                                            irigasi</td>
                                        <td>Kepala Dinas
                                            PUPRKIM
                                            Provinsi Bali</td>
                                        <td></td>
                                        <td></td>
                                        <td>2023-10-16
                                            00:00:00</td>
                                        <td>18</td>
                                        <td>4</td>
                                        <td>BKPSDM
                                            Provinsi
                                            Bali</td>
                                        <td>Kolaborasi dengan IKATAN AHLI PERENCANAA INDONESIA (IAP)</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
