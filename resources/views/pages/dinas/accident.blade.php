@extends('layouts.app')
@section('content')
    <h3>
        Kecelakaan
    </h3>
    <div class="d-flex justify-content-between mb-3">
        <div class="d-flex justify-content-header gap-3 mt-4">
            <div class="">
                <div class="position-relative mb-3 ">
                    <input type="search" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Search">
                    <i
                        class="bx bx-search-alt-2
                position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>
            <div class="">
                <button class="btn text-white" style="background-color: #2CA67A">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>Export
                </button>
            </div>
        </div>
        <div class="">
            <button class="btn text-white" style="background-color: #1B3061">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                        fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                        fill="white" />
                </svg>Tambah
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card ">
                <div class="card-body">
                    <div class="badge bg-light text-info">
                        <p class="mb-0 px-3 py-1 fs-6">
                            Nama Pekerjakan
                        </p>
                    </div>
                    <div class="">
                        <p class="mb-0 mt-3 fs-4" style="font-weight: 600">
                            Nama Perusahaan
                        </p>
                    </div>
                    <div class="d-flex justify-content-header gap-3 mt-4">
                        <div class="">
                            <button class="btn btn-danger">
                                Hapus
                            </button>
                        </div>
                        <div class="">
                            <button class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button class="btn text-white" style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card ">
                <div class="card-body">
                    <div class="badge bg-light text-info">
                        <p class="mb-0 px-3 py-1 fs-6">
                            Nama Pekerjakan
                        </p>
                    </div>
                    <div class="">
                        <p class="mb-0 mt-3 fs-4" style="font-weight: 600">
                            Nama Perusahaan
                        </p>
                    </div>
                    <div class="d-flex justify-content-header gap-3 mt-4">
                        <div class="">
                            <button class="btn btn-danger">
                                Hapus
                            </button>
                        </div>
                        <div class="">
                            <button class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button class="btn text-white" style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card ">
                <div class="card-body">
                    <div class="badge bg-light text-info">
                        <p class="mb-0 px-3 py-1 fs-6">
                            Nama Pekerjakan
                        </p>
                    </div>
                    <div class="">
                        <p class="mb-0 mt-3 fs-4" style="font-weight: 600">
                            Nama Perusahaan
                        </p>
                    </div>
                    <div class="d-flex justify-content-header gap-3 mt-4">
                        <div class="">
                            <button class="btn btn-danger">
                                Hapus
                            </button>
                        </div>
                        <div class="">
                            <button class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button class="btn text-white" style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card ">
                <div class="card-body">
                    <div class="badge bg-light text-info">
                        <p class="mb-0 px-3 py-1 fs-6">
                            Nama Pekerjakan
                        </p>
                    </div>
                    <div class="">
                        <p class="mb-0 mt-3 fs-4" style="font-weight: 600">
                            Nama Perusahaan
                        </p>
                    </div>
                    <div class="d-flex justify-content-header gap-3 mt-4">
                        <div class="">
                            <button class="btn btn-danger">
                                Hapus
                            </button>
                        </div>
                        <div class="">
                            <button class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button class="btn text-white" style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card ">
                <div class="card-body">
                    <div class="badge bg-light text-info">
                        <p class="mb-0 px-3 py-1 fs-6">
                            Nama Pekerjakan
                        </p>
                    </div>
                    <div class="">
                        <p class="mb-0 mt-3 fs-4" style="font-weight: 600">
                            Nama Perusahaan
                        </p>
                    </div>
                    <div class="d-flex justify-content-header gap-3 mt-4">
                        <div class="">
                            <button class="btn btn-danger">
                                Hapus
                            </button>
                        </div>
                        <div class="">
                            <button class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button class="btn text-white" style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card ">
                <div class="card-body">
                    <div class="badge bg-light text-info">
                        <p class="mb-0 px-3 py-1 fs-6">
                            Nama Pekerjakan
                        </p>
                    </div>
                    <div class="">
                        <p class="mb-0 mt-3 fs-4" style="font-weight: 600">
                            Nama Perusahaan
                        </p>
                    </div>
                    <div class="d-flex justify-content-header gap-3 mt-4">
                        <div class="">
                            <button class="btn btn-danger">
                                Hapus
                            </button>
                        </div>
                        <div class="">
                            <button class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button class="btn text-white" style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
