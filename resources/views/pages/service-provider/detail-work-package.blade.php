@extends('layouts.app')
@section('content')
    <h4 class="mb-3 font-size-18">Detail Daftar Progres</h4>
    <div class="d-flex justify-content-between mb-3">
        <div class="d-flex position-relative">
            <div class="btn btn-success btn-md">
                <i class="bx bxs-download mt-1 me-1"></i>Export
            </div>
        </div>

        <div>
            <button class="btn btn-warning btn-md">
                <i class="fas fa-arrow-left" style="margin-right:10px"></i>Kembali
            </button>
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
                                <a href="" class="btn btn-primary btn-md rounded-4  " style="background-color: #1B3061;">
                                    Detail
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
                                <a href="" class="btn btn-success btn-md me-2 rounded-4">
                                    Upload Progres
                                </a>
                                <a href="" class="btn btn-primary btn-md rounded-4" style="background-color: #1B3061;">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
