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
            <button class="btn text-white mt-4" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl"
                style="background-color: #1B3061">
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
    {{-- modal --}}
    <div class="modal fade bs-example-modal-xl" id="modal-create" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form action="" id="form-create" method="post">
                        <div id="basic-example">
                            <!-- Seller Details -->
                            <h3>informasi Umum</h3>
                            <section>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-year">Pekerjaan</label>
                                                <select name="source_fund" class="form-control select2-create"
                                                    style="width:100%" id="update-source_found">
                                                    <option value="option a">option a</option>
                                                    <option value="option a">option a</option>
                                                    <option value="option a">option a</option>
                                                    <option value="option a">option a</option>
                                                    <option value="option a">option a</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-name">Perusahaan</label>
                                                <input type="text" class="form-control" name="name" id="update-name"
                                                    placeholder="masukan nama pekerjaan">
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-source_found">Lokasi</label>
                                                <input type="text" class="form-control" name="name" id="update-name"
                                                    placeholder="masukan nama pekerjaan">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-email-input">Waktu</label>
                                                <input type="date" class="form-control" name="name" id="update-name"
                                                    placeholder="masukan nama pekerjaan">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </section>
    
                            <!-- Company Document -->
                            <h3>Kontrak</h3>
                            <section>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-nilai_kontrak">Deskripsi</label>
                                                <textarea name="" id="" class="form-control"></textarea>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-vatno-input">Kerugian</label>
                                                <textarea name="" id="" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-cstno-input">Masalah</label>
                                                <textarea name="" id="" class="form-control"></textarea>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="update-servicetax-input">Sumber Dana</label>
                                                <select name="sumber" class="form-control select2-create" style="width:100%"
                                                    id="update-sumber">
                                                    <option value="option a">option a</option>
                                                    <option value="option a">option a</option>
                                                    <option value="option a">option a</option>
                                                    <option value="option a">option a</option>
                                                    <option value="option a">option a</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- end modal --}}
    {{-- modal edit --}}
    <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="card-body">

                    <div id="basic-update">
                        <!-- Seller Details -->
                        <h3>informasi Umum</h3>
                        <section>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-year">Pekerjaan</label>
                                            <select name="source_fund" class="form-control select2-create"
                                                style="width:100%" id="update-source_found">
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-name">Perusahaan</label>
                                            <input type="text" class="form-control" name="name" id="update-name"
                                                placeholder="masukan nama pekerjaan">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-source_found">Lokasi</label>
                                            <input type="text" class="form-control" name="name" id="update-name"
                                                placeholder="masukan nama pekerjaan">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-email-input">Waktu</label>
                                            <input type="date" class="form-control" name="name" id="update-name"
                                                placeholder="masukan nama pekerjaan">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>

                        <!-- Company Document -->
                        <h3>Kontrak</h3>
                        <section>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-nilai_kontrak">Deskripsi</label>
                                            <textarea name="" id="" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-vatno-input">Kerugian</label>
                                            <textarea name="" id="" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-cstno-input">Masalah</label>
                                            <textarea name="" id="" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="update-servicetax-input">Sumber Dana</label>
                                            <select name="sumber" class="form-control select2-create" style="width:100%"
                                                id="update-sumber">
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- end modal edit --}}
    {{-- modal detail --}}

    <div class="modal fade bs-example-modal-md" id="modal-detail" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-info">
                                <p class="mb-0 px-3 py-1 fs-6">
                                    2022
                                </p>
                            </div>
                            <p class="mt-3 fs-5 text-dark mb-2" style="font-weight: 700">
                                PJL Kel. Purwosari Kec. Purwosari
                            </p>
                            <div class="">
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Nilai Kontrak :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">APBD KAB/KOTA</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Progres Fisik :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">Teknisi</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Progres Keuangan :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">Jenjang 4</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Status :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">SIPIL</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Mulai :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">APBD KAB/KOTA</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Selesai :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">Teknisi</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Fisik Bulan :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">Kabpaten pasuruan</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Keuangan Bulan :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">20</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Sumber Dana :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">23</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Pengguna Jasa :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">33</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Penyedia NIB :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">Lorem Ipsum Dolor Sit
                                            Amet Lorem Ipsm Dolor
                                            Sit Amet</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Penyedia Nama :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">KAB.PASURUAN</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">jenis Kontrak :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">JAWA TIMUR</p>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark">Karakteristik Kontrak :</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-2 text-dark" style="font-weight:600;">JAWA TIMUR</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- end modal --}}
    <div class="row">
        <div class="col-12 col-lg-6 col-xxl-4">
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
                            <button data-bs-toggle="modal" data-bs-target="#modal-update" class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#modal-detail"
                                href="{{ route('detail-accident.index') }}" class="btn text-white"
                                style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl-4">
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
                            <button data-bs-toggle="modal" data-bs-target="#modal-update" class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#modal-detail"
                                href="{{ route('detail-accident.index') }}" class="btn text-white"
                                style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl-4">
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
                            <button data-bs-toggle="modal" data-bs-target="#modal-update" class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#modal-detail"
                                href="{{ route('detail-accident.index') }}" class="btn text-white"
                                style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl-4">
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
                            <button data-bs-toggle="modal" data-bs-target="#modal-update" class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#modal-detail"
                                href="{{ route('detail-accident.index') }}" class="btn text-white"
                                style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl-4">
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
                            <button data-bs-toggle="modal" data-bs-target="#modal-update" class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#modal-detail"
                                href="{{ route('detail-accident.index') }}" class="btn text-white"
                                style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl-4">
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
                            <button data-bs-toggle="modal" data-bs-target="#modal-update" class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#modal-detail"
                                href="{{ route('detail-accident.index') }}" class="btn text-white"
                                style="background-color: #1B3061">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".select2-create").select2({
                dropdownParent: $("#modal-create, #modal-update")
            });
        });
    </script>
@endsection
