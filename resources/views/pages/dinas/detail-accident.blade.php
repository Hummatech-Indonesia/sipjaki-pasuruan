@extends('layouts.app')
@section('content')
    <h3 class="text-dark" style="font-weight:600">
        Detail Kecelakaan
    </h3>
    <div class="d-flex justify-content-between mt-4 mb-3">
        <div class="">
            <button class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>&nbsp;Export</button>
        </div>
        <div class="">
            <a href="{{ route('accident') }}" class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg"  width="18" height="18" viewBox="0 0 20 16" fill="none">
                    <path
                        d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM20 7L1 7V9L20 9V7Z"
                        fill="white" />
                </svg> &nbsp;Kembali
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="badge bg-light text-info">
                <p class="mb-0 px-3 py-1 fs-6">
                    Arsitektur
                </p>
            </div>
            <h5 class="mt-4 text-dark" style="font-weight: 700">
                pt Sipjaki indonesia
            </h5>
            <div class="row mt-4">
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">Lokasi</p>
                </div>
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">:</p>
                </div>
                <div class="col-2 col-xxl-5 col-lg-4">
                    <p class="fw-bold" style="font-weight: 500">Kec. Wawonii Barat, Kab. Konawe Kepulauan</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">Waktu</p>
                </div>
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">:</p>
                </div>
                <div class="col-2">
                    <p class="fw-bold" style="font-weight: 500">10</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">Deskripsi</p>
                </div>
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">:</p>
                </div>
                <div class="col-2">
                    <p class="fw-bold" style="font-weight: 500">Lorem Ipsum Dolor Sit Amet  </p>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">Keerugian</p>
                </div>
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">:</p>
                </div>
                <div class="col-2">
                    <p class="fw-bold" style="font-weight: 500">Non-Aktif</p>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">Masalah</p>
                </div>
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">:</p>
                </div>
                <div class="col-2">
                    <p class="fw-bold" style="font-weight: 500">2022-08-22</p>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">Kota</p>
                </div>
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">:</p>
                </div>
                <div class="col-2">
                    <p class="fw-bold" style="font-weight: 500">Probolinggo</p>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">Provinsi</p>
                </div>
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">:</p>
                </div>
                <div class="col-2">
                    <p class="fw-bold" style="font-weight: 500">JAWA TIMUR</p>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">Sumber Dana</p>
                </div>
                <div class="col-1">
                    <p class="fw-bold" style="font-weight: 500">:</p>
                </div>
                <div class="col-2">
                    <p class="fw-bold" style="font-weight: 500">KAB. PASURUAN</p>
                </div>
            </div>
        </div>
    </div>
@endsection
