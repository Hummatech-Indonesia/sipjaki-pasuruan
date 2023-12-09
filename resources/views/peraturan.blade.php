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
        background: var(--Kuning, #FFC928);" class="title">Data Peraturan</h2>
        </div>
    </div>
    <div class="d-flex row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Peraturan</h4>

                    <div id="column_chart_datalabel" data-colors='["#FFC928"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div>
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
                                            Kategori</th>
                                        <th class="fw-medium"
                                            style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                            Nomor</th>
                                        <th class="fw-medium"
                                            style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                            Tahun</th>
                                        <th class="fw-medium"
                                            style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                            Judul</th>
                                        <th class="fw-medium"
                                            style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                            Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <th scope="row" class="fs-5">1</th>
                                            <td>Undang - undan</td>
                                            <td>Nomor 22 Tahun 2020</td>
                                            <td>2020</td>
                                            <td>Tentang Peraturan Pelaksanaan Undang - Undang Nomor 2 Tahun 2017 Tentang Jasa Konstruksi</td>
                                            <td><div class="btn btn-success btn-sm d-flex"><svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="15" height="15" viewBox="0 0 24 24" fill="none">
                                                <path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg> Download</div></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/apexcharts.init.js"></script>
@endsection
