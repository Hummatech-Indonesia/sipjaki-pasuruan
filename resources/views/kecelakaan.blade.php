@extends('layouts.app-landing-page')
@section('content')
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <div class="tabs-wrapper">
        <div class="section-title text-center">
            <h2 style="border-radius: 16px;
        background: var(--Kuning, #FFC928);" class="title">Data Kecelakaan Kabupaten Pasuruan</h2>
        </div>
    </div>
    <div class="d-flex row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Kecelakaan</h5>
                    <h2>234 Korban</h2>
                    <h5>Tahun 2023</h5>
                    <div id="bar_chart" data-colors='["#1B3061"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Data Kecelakaan</h4>

                    <div id="column_chart_datalabel" data-colors='["#FFC928"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/apexcharts.init.js"></script>
@endsection
