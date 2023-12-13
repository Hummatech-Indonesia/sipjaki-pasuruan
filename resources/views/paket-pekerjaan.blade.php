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
        background: var(--Kuning, #FFC928);" class="title p-1">Data Paket Pekerjaan</h2>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12">
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
                                        Nama Dinas</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; text-align: center">Jumlah</th>
                                    <th class="fw-medium"
                                        style="background-color: #1B3061; color: white; text-align: center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dinas as $item)
                                <tr>
                                    <th scope="row" class="fs-5">{{$loop->iteration}}</th>
                                    <td class="fs-5">{{$item->user->name}}</td>
                                    <td class="fs-5 text-center">{{$item->projects_count}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('detail.project',['dinas' => $item->id]) }}" class="text-white btn" style="background-color: #1B3061">Detail</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <div class="d-flex justify-content-center" style="min-height:16rem">
                                            <div class="my-auto">
                                                <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                                <h4 class="text-center mt-4">Belum Ada Dinas Ditambahkan!!</h4>
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
