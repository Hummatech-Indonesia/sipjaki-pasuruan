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
        background: var(--Kuning, #FFC928);" class="title p-1">Detail Paket
                Pekerjaan</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header text-white mb-0" style="background-color: #1B3061">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            No
                        </div>
                        <div class="">
                            Dinas
                        </div>
                        <div class="">
                            Jumlah
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($data as $item)
                    <div class="d-flex justify-content-between mb-3">
                        <div class="">
                            {{$loop->iteration}}
                        </div>
                        <div class="">
                            {{$item->user->name}}
                        </div>
                        <div class="">
                            {{$item->projects_count}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-row align-items-center mb-3">
                        <div class="position-relative col-lg-3 search-container">
                            <input type="search" class="py-2 ps-5" id="search-name" placeholder="Search">
                            <i class="bx bx-search-alt search-icon"></i>
                        </div>
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
                                @forelse ($detailDinas->projects as $project)
                                    <th scope="row" class="fs-5">{{$loop->iteration}}</th>
                                    <td class="fs-5">{{$project->name}}</td>
                                    <td class="fs-5">{{$project->fundSource->name}}</td>
                                    <td class="fs-5">{{$project->project_value}}</td>
                                    <td class="fs-5">{{$project->start_at->isoFormat('Do MMMM YYYY', 'ID')}}</td>
                                    <td class="fs-5">{{$project->end_at->isoFormat('Do MMMM YYYY', 'ID')}}</td>
                                    <td class="fs-5">{{$project->status}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('detail-project',['dinas' => $item->id]) }}" class="text-white btn" style="background-color: #1B3061">Detail</a>
                                    </td>
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
