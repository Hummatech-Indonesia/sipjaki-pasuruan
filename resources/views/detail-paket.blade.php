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
    </style>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <div class="tabs-wrapper">
        <div class="section-title text-center">
            <h2 style="border-radius: 16px;
        background: var(--Kuning, #FFC928);" class="title p-1">Detail Paket
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
                    <form>
                        <div class="d-flex justify-content-header gap-2">
                            <div class="d-flex d-row align-items-center mb-3">
                                <div class="position-relative  search-container">
                                    <input type="search" value="{{ $name }}" class="py-2 ps-5" id="search-name" name="name" placeholder="Search">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="text-white btn" style="background-color: #1B3061">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0" border="1">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-medium"
                                        style="background-color: #1B3062; color: white; border-right: 1px solid #1B3061;">
                                        No</th>
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
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; text-align: center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($detailDinas as $project)
                                <tr>

                                    <th scope="row" class="fs-5">{{ $loop->iteration }}</th>
                                    <td class="fs-5">{{ $project->name }}</td>
                                    <td class="fs-5">{{ $project->fundSource->name }}</td>
                                    <td class="fs-5">{{ 'Rp ' . number_format($project->project_value, 0, ',', '.') }}</td>
                                    <td class="fs-5">
                                        {{ Carbon::parse($project->start_date)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                    </td>
                                    <td class="fs-5">
                                        {{ Carbon::parse($project->end_date)->locale('id_ID')->isoFormat('DD MMMM Y') }}
                                    </td>
                                    <td class="fs-5">{{ $project->status == "active" ? "Aktif":"Non Aktif"}}</td>
                                    {{-- <td class="text-center">
                                        <a href="{{ route('detail-project', ['project' => $item->id]) }}"
                                            class="text-white btn" style="background-color: #1B3061">Detail</a>
                                        </td> --}}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
