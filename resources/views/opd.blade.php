@extends('layouts.app-landing-page')
@section('content')
    <div class="tabs-wrapper">
        <div class="section-title text-center">
            <h2 style="border-radius: 16px;
        background: var(--Kuning, #FFC928);" class="title p-2">OPD</h2>
        </div>
    </div>
    <div class="d-flex row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Column Chart</h4>
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

                    <div id="donut_chart"
                        data-colors='["--bs-success","--bs-primary", "--bs-danger","--bs-info", "--bs-warning"]'
                        class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
@endsection
