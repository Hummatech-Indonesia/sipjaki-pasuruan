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
        background: var(--Kuning, #FFC928);" class="title p-1">Data Kecelakaan
                Kabupaten Pasuruan</h2>
        </div>
    </div>

    <div class="d-flex row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Data Kecelakaan</h4>
                    <form action="" class="row">
                        <div class="col-4 d-flex justify-content-header gap-2">
                            <select name="year" id="year" class="form-select mb-3">
                            </select>
                            <div class="">
                                <button type="submit" class="text-white btn" style="background-color: #1B3061">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th class="fw-medium"
                                    style="background-color: #1B3062; color: white; border-right: 1px solid #1B3061;">
                                    No</th>
                                <th class="fw-medium"
                                    style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                    Nama Dinas</th>
                                <th class="fw-medium" style="background-color: #1B3061; color: white; text-align: center">
                                    Jumlah Kecelakaan</th>
                            </thead>
                            <tbody>
                                @forelse ($total as $data)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $data->user->name ?? "" }}
                                        </td>
                                        <td class="text-center">{{ $data->total_accident }}</td>
                                    </tr>
                                @empty
                                @endforelse
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
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var currentYear = new Date().getFullYear();

            var startYear = 2023;

            var yearSelectElement = document.getElementById("year");

            var years = [];
            for (var year = startYear; year <= currentYear; year++) {
                years.push(year);
            }

            years.forEach(function(year) {
                var optionElement = document.createElement("option");
                optionElement.value = year;
                optionElement.text = year;
                yearSelectElement.add(optionElement);
            });
        });
    </script>
@endsection
