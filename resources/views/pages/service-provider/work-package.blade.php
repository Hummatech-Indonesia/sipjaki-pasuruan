@extends('layouts.app')
@section('content')
    <h4 class="mb-3 font-size-18">Paket Pekerjaan</h4>
    <div class="d-flex justify-content-between">
        <div class="d-flex position-relative mb-3 col-lg-3 ">
            <input type="search" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Search">
            <i class="bx bx-search-alt-2 position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
            <div class="d-flex btn btn-success btn-md ms-2">
                <i class="bx bxs-download mt-1 me-1"></i>Export
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="btn btn-sm mb-2 text-dark rounded-3" style="background-color: #E4ECFF;">
                                2023
                            </div>
                            <p class="fw-bolder fs-5">PJL Kel. Purwosari Kec. Purwosari</p>
                            <p class="text-muted fw-medium">Selesai</p>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('detail-work-package') }}" class="btn btn-primary btn-md rounded-4  " style="background-color: #1B3061;">
                                    Lihat Progress
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="btn btn-sm mb-2 text-dark" style="background-color: #E4ECFF;">
                                2023
                            </div>
                            <p class="fw-bolder fs-5">PJL Kel. Purwosari Kec. Purwosari</p>
                            <p class="text-muted fw-medium">Selesai</p>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('detail-work-package') }}" class="btn btn-primary btn-md rounded-4" style="background-color: #1B3061;">
                                    Lihat Progress
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
