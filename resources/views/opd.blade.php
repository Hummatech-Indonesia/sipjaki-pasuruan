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
        background: var(--Kuning, #FFC928);" class="title p-1">OPD</h2>
        </div>
    </div>
    <div class="d-flex row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex">
                        <div class="col-4">
                            <h5 class="title fw-bold">Total OPD Pasuruan</h5>
                            <h1 class="fw-bolder" style="color: #1B3061;">34</h1>
                        </div>
                        <div class="col-6">
                            <h5 class="title fw-bold">Total OPD Kabupaten Kota</h5>
                            <h1 class="fw-bolder" style="color:#1B3061;">513</h1>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <div class="mb-1 fw-semibold">
                                    Pringkat 1
                                </div>
                                <div class="btn btn-sm rounded-3 fs-5 fw-semibold" style="background-color: #E4ECFF;color:#1B3061;">
                                    Sumbat
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="mb-1 fw-semibold">
                                    Pringkat 2
                                </div>
                                <div class="btn btn-sm rounded-3 fs-5 fw-semibold" style="background-color: #E4ECFF;color:#1B3061;">
                                    Sumbat
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="mb-1 fw-semibold">
                                    Pringkat 3
                                </div>
                                <div class="btn btn-sm rounded-3 fs-5 fw-semibold" style="background-color: #E4ECFF;color:#1B3061;">
                                    Sumbat
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="bar_chart" data-colors='["--bs-success"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="d-flex row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Column Chart</h4>

                    <div id="column_chart" data-colors='["--bs-success","--bs-primary", "--bs-danger"]' class="apex-charts"
                        dir="ltr"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Donut Chart</h4>

                    <div id="donut_chart" data-colors='["#FFC928", "#1B3061"]' class="apex-charts" dir="ltr"></div>

                </div>
            </div>
        </div>
    </div>
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/apexcharts.init.js"></script>
@endsection
