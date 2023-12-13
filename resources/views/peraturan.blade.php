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
                                @forelse ($rules as $index=> $rule)
                                    <tr>
                                        <th scope="row" class="fs-5">{{ $index + 1 }}</th>
                                        <td>{{ $rule->ruleCategory->name }}</td>
                                        <td>{{ $rule->code }}</td>
                                        <td>{{ $rule->year }}</td>
                                        <td>{{ $rule->title }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ asset('storage/' . $rule->file) }}">
                                                    <button type="submit" class="btn text-white fw-normal" style="background-color:#2CA67A;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" fill="white" transform="rotate(90)" viewBox="0 0 512 512">
                                                            <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                                                        </svg>
                                                        <span class="ms-2">Download</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
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
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>
@endsection
