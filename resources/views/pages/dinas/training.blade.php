@extends('layouts.app')
@section('content')
    <p class="fs-4 text-dark" style="font-weight: 600">
        Pelatihan
    </p>
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-header gap-3">
            <div class="">
                <button class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Export
                </button>
            </div>
        </div>
        <div class="">
            <button data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl" class="btn text-white" style="background-color:#1B3061">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                        fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                        fill="white" />
                </svg>Tambah Pelatihan
            </button>
        </div>
    </div>
    <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Tahun Anggaran
                            </p>
                            <select name="" id="" class="form-select">
                                <option value="">Bimtek SMKK</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Sumber Dana
                            </p>
                            <select name="" id="" class="form-select">
                                <option value="">Bimtek SMKK</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Nama
                            </p>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-3 mt-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Kualifikasi
                            </p>
                            <select name="" id="" class="form-select">
                                <option value="">Bimtek SMKK</option>
                            </select>
                        </div>
                        <div class="col-3 mt-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Jenjang KKNI
                            </p>
                            <select name="" id="" class="form-select">
                                <option value="">Bimtek SMKK</option>
                            </select>
                        </div>
                        <div class="col-3 mt-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Klasifikasi
                            </p>
                            <select name="" id="" class="form-select">
                                <option value="">Bimtek SMKK</option>
                            </select>
                        </div>
                        <div class="col-3 mt-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Sub Klasifikasi
                            </p>
                            <select name="" id="" class="form-select">
                                <option value="">Bimtek SMKK</option>
                            </select>
                        </div>
                        <div class="col-3 mt-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Waktu Pelaksanaan
                            </p>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-3 mt-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Selesai Pelaksanaan
                            </p>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-3 mt-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Jam Pelajaran
                            </p>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-3 mt-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Metode Pelatihan
                            </p>
                            <select name="" id="" class="form-select">
                                <option value="">Bimtek SMKK</option>
                            </select>
                        </div>
                        <div class="col-6 mt-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Lokasi
                            </p>
                            <textarea name="" id="" class="form-control"></textarea>
                        </div>
                        <div class="col-6 mt-4">
                            <p class="mb-2 text-dark" style="font-weight: 600">
                                Keterangan
                            </p>
                            <textarea name="" id="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                    <button type="submit" class="btn text-white" style="background-color: #1B3061">Tambah</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="row">
        <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="badge bg-info">
                        <p class="mb-0 px-3 py-1 fs-6">
                            2022
                        </p>
                    </div>
                    <p class="mt-3 fs-5 text-dark mb-0" style="font-weight: 700">
                        Bimtek SMKK
                    </p>
                    <p class="mb-3">
                        Dinas Bina marga dan bina Konstruksi
                    </p>
                    <div class="">
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Sumber Dana :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">APBD KAB/KOTA</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Jenis Keahlian :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Teknisi</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Tingkat Keahlian :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Jenjang 4</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Klasifikasi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">SIPIL</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Sub Klasifikasi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">APBD KAB/KOTA</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Metode Pelatihan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Teknisi</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Waktu Pelaksanaan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Jenjang 4</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Selesai Pelaksanaan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">2020-12-02</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Lokasi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Kabpaten pasuruan</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Jam Pelajaran  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">20</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Laki - Laki  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">23</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Perempuan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">33</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Keterangan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Lorem Ipsum Dolor Sit
                                    Amet Lorem Ipsm Dolor
                                    Sit Amet</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Kota  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">KAB.PASURUAN</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Provinsi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">JAWA TIMUR</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <button class="btn btn-warning">Select</button>
                        </div>
                        <div class="d-flex justify-content-header gap-3">
                            <div class="">
                                <button class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_116_5266)">
                                          <path d="M7 7H6C5.46957 7 4.96086 7.21071 4.58579 7.58579C4.21071 7.96086 4 8.46957 4 9V18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20H15C15.5304 20 16.0391 19.7893 16.4142 19.4142C16.7893 19.0391 17 18.5304 17 18V17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M20.385 6.58511C20.7788 6.19126 21.0001 5.65709 21.0001 5.10011C21.0001 4.54312 20.7788 4.00895 20.385 3.61511C19.9912 3.22126 19.457 3 18.9 3C18.343 3 17.8088 3.22126 17.415 3.61511L9 12.0001V15.0001H12L20.385 6.58511V6.58511Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M16 5L19 8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_116_5266">
                                            <rect width="24" height="24" fill="white"/>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                </button>
                            </div>
                            <div class="">
                                <button class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z" fill="white"/>
                                      </svg>
                                </button>
                            </div>
                            <div class="">
                                <button class="btn" style="background-color: #1B3061">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="white"/>
                                        <path d="M18.5072 6.61781C16.4578 5.2125 14.2645 4.5 11.9887 4.5C9.94078 4.5 7.94438 5.10937 6.05484 6.30375C4.14937 7.51078 2.28141 9.70312 0.75 12C1.98844 14.0625 3.6825 16.1831 5.44687 17.3991C7.47094 18.7931 9.67172 19.5 11.9887 19.5C14.2856 19.5 16.4817 18.7936 18.5184 17.4005C20.3114 16.1719 22.0177 14.0541 23.25 12C22.0134 9.96422 20.3016 7.84875 18.5072 6.61781ZM12 16.5C11.11 16.5 10.24 16.2361 9.49993 15.7416C8.75991 15.2471 8.18314 14.5443 7.84254 13.7221C7.50195 12.8998 7.41283 11.995 7.58647 11.1221C7.7601 10.2492 8.18868 9.44736 8.81802 8.81802C9.44736 8.18868 10.2492 7.7601 11.1221 7.58647C11.995 7.41283 12.8998 7.50195 13.7221 7.84254C14.5443 8.18314 15.2471 8.75991 15.7416 9.49993C16.2361 10.24 16.5 11.11 16.5 12C16.4986 13.1931 16.0241 14.3369 15.1805 15.1805C14.3369 16.0241 13.1931 16.4986 12 16.5Z" fill="white"/>
                                      </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="badge bg-info">
                        <p class="mb-0 px-3 py-1 fs-6">
                            2022
                        </p>
                    </div>
                    <p class="mt-3 fs-5 text-dark mb-0" style="font-weight: 700">
                        Bimtek SMKK
                    </p>
                    <p class="mb-3">
                        Dinas Bina marga dan bina Konstruksi
                    </p>
                    <div class="">
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Sumber Dana :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">APBD KAB/KOTA</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Jenis Keahlian :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Teknisi</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Tingkat Keahlian :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Jenjang 4</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Klasifikasi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">SIPIL</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Sub Klasifikasi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">APBD KAB/KOTA</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Metode Pelatihan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Teknisi</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Waktu Pelaksanaan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Jenjang 4</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Selesai Pelaksanaan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">2020-12-02</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Lokasi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Kabpaten pasuruan</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Jam Pelajaran  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">20</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Laki - Laki  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">23</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Perempuan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">33</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Keterangan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Lorem Ipsum Dolor Sit
                                    Amet Lorem Ipsm Dolor
                                    Sit Amet</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Kota  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">KAB.PASURUAN</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Provinsi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">JAWA TIMUR</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <button class="btn btn-warning">Select</button>
                        </div>
                        <div class="d-flex justify-content-header gap-3">
                            <div class="">
                                <button class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_116_5266)">
                                          <path d="M7 7H6C5.46957 7 4.96086 7.21071 4.58579 7.58579C4.21071 7.96086 4 8.46957 4 9V18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20H15C15.5304 20 16.0391 19.7893 16.4142 19.4142C16.7893 19.0391 17 18.5304 17 18V17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M20.385 6.58511C20.7788 6.19126 21.0001 5.65709 21.0001 5.10011C21.0001 4.54312 20.7788 4.00895 20.385 3.61511C19.9912 3.22126 19.457 3 18.9 3C18.343 3 17.8088 3.22126 17.415 3.61511L9 12.0001V15.0001H12L20.385 6.58511V6.58511Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M16 5L19 8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_116_5266">
                                            <rect width="24" height="24" fill="white"/>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                </button>
                            </div>
                            <div class="">
                                <button class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z" fill="white"/>
                                      </svg>
                                </button>
                            </div>
                            <div class="">
                                <button class="btn" style="background-color: #1B3061">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="white"/>
                                        <path d="M18.5072 6.61781C16.4578 5.2125 14.2645 4.5 11.9887 4.5C9.94078 4.5 7.94438 5.10937 6.05484 6.30375C4.14937 7.51078 2.28141 9.70312 0.75 12C1.98844 14.0625 3.6825 16.1831 5.44687 17.3991C7.47094 18.7931 9.67172 19.5 11.9887 19.5C14.2856 19.5 16.4817 18.7936 18.5184 17.4005C20.3114 16.1719 22.0177 14.0541 23.25 12C22.0134 9.96422 20.3016 7.84875 18.5072 6.61781ZM12 16.5C11.11 16.5 10.24 16.2361 9.49993 15.7416C8.75991 15.2471 8.18314 14.5443 7.84254 13.7221C7.50195 12.8998 7.41283 11.995 7.58647 11.1221C7.7601 10.2492 8.18868 9.44736 8.81802 8.81802C9.44736 8.18868 10.2492 7.7601 11.1221 7.58647C11.995 7.41283 12.8998 7.50195 13.7221 7.84254C14.5443 8.18314 15.2471 8.75991 15.7416 9.49993C16.2361 10.24 16.5 11.11 16.5 12C16.4986 13.1931 16.0241 14.3369 15.1805 15.1805C14.3369 16.0241 13.1931 16.4986 12 16.5Z" fill="white"/>
                                      </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="badge bg-info">
                        <p class="mb-0 px-3 py-1 fs-6">
                            2022
                        </p>
                    </div>
                    <p class="mt-3 fs-5 text-dark mb-0" style="font-weight: 700">
                        Bimtek SMKK
                    </p>
                    <p class="mb-3">
                        Dinas Bina marga dan bina Konstruksi
                    </p>
                    <div class="">
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Sumber Dana :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">APBD KAB/KOTA</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Jenis Keahlian :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Teknisi</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Tingkat Keahlian :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Jenjang 4</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Klasifikasi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">SIPIL</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Sub Klasifikasi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">APBD KAB/KOTA</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Metode Pelatihan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Teknisi</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Waktu Pelaksanaan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Jenjang 4</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Selesai Pelaksanaan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">2020-12-02</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Lokasi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Kabpaten pasuruan</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Jam Pelajaran  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">20</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Laki - Laki  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">23</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Perempuan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">33</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Keterangan  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">Lorem Ipsum Dolor Sit
                                    Amet Lorem Ipsm Dolor
                                    Sit Amet</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Kota  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">KAB.PASURUAN</p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-5">
                                <p class="mb-2 text-dark">Provinsi  :</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-2 text-dark" style="font-weight:600;">JAWA TIMUR</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <button class="btn btn-warning">Select</button>
                        </div>
                        <div class="d-flex justify-content-header gap-3">
                            <div class="">
                                <button class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_116_5266)">
                                          <path d="M7 7H6C5.46957 7 4.96086 7.21071 4.58579 7.58579C4.21071 7.96086 4 8.46957 4 9V18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20H15C15.5304 20 16.0391 19.7893 16.4142 19.4142C16.7893 19.0391 17 18.5304 17 18V17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M20.385 6.58511C20.7788 6.19126 21.0001 5.65709 21.0001 5.10011C21.0001 4.54312 20.7788 4.00895 20.385 3.61511C19.9912 3.22126 19.457 3 18.9 3C18.343 3 17.8088 3.22126 17.415 3.61511L9 12.0001V15.0001H12L20.385 6.58511V6.58511Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M16 5L19 8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_116_5266">
                                            <rect width="24" height="24" fill="white"/>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                </button>
                            </div>
                            <div class="">
                                <button class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z" fill="white"/>
                                      </svg>
                                </button>
                            </div>
                            <div class="">
                                <button class="btn" style="background-color: #1B3061">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="white"/>
                                        <path d="M18.5072 6.61781C16.4578 5.2125 14.2645 4.5 11.9887 4.5C9.94078 4.5 7.94438 5.10937 6.05484 6.30375C4.14937 7.51078 2.28141 9.70312 0.75 12C1.98844 14.0625 3.6825 16.1831 5.44687 17.3991C7.47094 18.7931 9.67172 19.5 11.9887 19.5C14.2856 19.5 16.4817 18.7936 18.5184 17.4005C20.3114 16.1719 22.0177 14.0541 23.25 12C22.0134 9.96422 20.3016 7.84875 18.5072 6.61781ZM12 16.5C11.11 16.5 10.24 16.2361 9.49993 15.7416C8.75991 15.2471 8.18314 14.5443 7.84254 13.7221C7.50195 12.8998 7.41283 11.995 7.58647 11.1221C7.7601 10.2492 8.18868 9.44736 8.81802 8.81802C9.44736 8.18868 10.2492 7.7601 11.1221 7.58647C11.995 7.41283 12.8998 7.50195 13.7221 7.84254C14.5443 8.18314 15.2471 8.75991 15.7416 9.49993C16.2361 10.24 16.5 11.11 16.5 12C16.4986 13.1931 16.0241 14.3369 15.1805 15.1805C14.3369 16.0241 13.1931 16.4986 12 16.5Z" fill="white"/>
                                      </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
