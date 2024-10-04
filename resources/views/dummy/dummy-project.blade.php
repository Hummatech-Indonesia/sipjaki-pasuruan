@extends('layouts.app-landing-page')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
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

        li.active .page-link {
            background-color: #1B3061!important;
            border-color: #1B3061!important;
        }
    </style>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <div class="tabs-wrapper" id="paket-pekerjaan">
        <div class="section-title text-center">
            <h2 style="border-radius: 16px;
        background: var(--Kuning, #FFC928);" class="title p-1">Paket
                Pekerjaan</h2>
        </div>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('paket.pekerjaan') }}">
            <button class="btn btn-warning">Kembali</button>
        </a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('paket.pekerjaan') }}#paket-pekerjaan" method="get">
                        <div class="d-flex justify-content-header gap-2">
                            <div class="d-flex d-row align-items-center mb-3">
                                <div class="position-relative  search-container">
                                    <input type="search" value="{{ request()->search }}" class="py-2 ps-5" id="search-name" name="search" placeholder="Search">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="text-white btn" style="background-color: #1B3061">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-3" border="1">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-medium"
                                        style="background-color: #1B3062; color: white; border-right: 1px solid #1B3061;">
                                        No</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Dinas</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Nama Pekerjaan</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; border-right: 1px solid #1B3061;">
                                        Tahun
                                        Anggaran</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; text-align: center">Nilai
                                        Kontrak</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; text-align: center">Mulai</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; text-align: center">Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dinas as $project)
                                <tr>
                                    <th scope="row" class="fs-5">{{ $loop->iteration }}</th>
                                    <td class="fs-5">{{ $project->nama_dinas }}</td>
                                    <td class="fs-5">{{ $project->nama_pekerjaan }}</td>
                                    <td class="fs-5">{{ $project->tahun_anggaran }}</td>
                                    <td class="fs-5">{{ 'Rp ' . number_format($project->nilai_kontrak, 0, ',', '.') }}</td>
                                    <td class="fs-5">
                                        {{ $project->tanggal_mulai->isoFormat('DD MMMM Y') }}
                                    </td>
                                    <td class="fs-5">
                                        {{ $project->tanggal_berakhir->isoFormat('DD MMMM Y') }}
                                    </td>
                                    </tr>
                                        @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <div class="d-flex justify-content-center" style="min-height:16rem">
                                                <div class="my-auto">
                                                    <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                                    <h4 class="text-center mt-4">Tidak Ada Paket!!</h4>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $dinas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
