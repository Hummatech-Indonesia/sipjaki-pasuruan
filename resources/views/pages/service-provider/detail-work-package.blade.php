@extends('layouts.app')
@section('content')
<style>
    td {
        vertical-align: top;
    }
</style>
    <h4 class="mb-3 font-size-18">Detail Daftar Progres</h4>
    <div class="d-flex justify-content-between mb-3">
        <div class="d-flex position-relative">
            <div class="btn btn-success btn-md rounded-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="15" height="15" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>Export
            </div>
        </div>

        <div>
            <button class="btn btn-warning btn-md rounded-3">
                <i class="fas fa-arrow-left" style="margin-right:10px"></i>Kembali
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    2023
                                </div>
                                <p class="fw-bolder fs-5">PJL Kel. Purwosari Kec. Purwosari</p>
                            </div>
                            <table cellpadding="10" style="border-collapse: collapse; width: 75%;">
                                <tbody>
                                    <tr>
                                        <td>Nilai Kontrak</td>
                                        <td>:</td>
                                        <td>546.103.000</td>
                                    </tr>
                                    <tr>
                                        <td>Progres Fisik</td>
                                        <td>:</td>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <td>Progres Keuangan</td>
                                        <td>:</td>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>Non-Aktive</td>
                                    </tr>
                                    <tr>
                                        <td>Mulai</td>
                                        <td>:</td>
                                        <td>2022-08-22</td>
                                    </tr>
                                    <tr>
                                        <td>Selesai</td>
                                        <td>:</td>
                                        <td>2022-08-22</td>
                                    </tr>
                                    <tr>
                                        <td>Fisik Bulanan</td>
                                        <td>:</td>
                                        <td>2022-08</td>
                                    </tr>
                                    <tr>
                                        <td>Keuangan Bulanan</td>
                                        <td>:</td>
                                        <td>2022-08</td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Dana</td>
                                        <td>:</td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td>Penggunaan Jasa</td>
                                        <td>:</td>
                                        <td colspan="2" style="vertical-align: top;">Dinas Perumahan dan Kawasan Permukiman Kab. Pasuruan</td>
                                    </tr>
                                    <tr>
                                        <td>Penyedia NIB</td>
                                        <td>:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Penyedia Nama</td>
                                        <td>:</td>
                                        <td>CV. Fattaah Rizqi</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kontrak</td>
                                        <td>:</td>
                                        <td>Harga Satuan</td>
                                    </tr>
                                    <tr>
                                        <td>Karakteristik Kontrak</td>
                                        <td>:</td>
                                        <td>Tahun Tunggal</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="ms-2 fw">
                            <p class="fw-medium fs-5" style="margin-bottom: 25%;">Daftar Progress</p>
                            <div class="fs-4 fw-bold" style="color: #1B3061;">
                                10 PROGRESS
                            </div>
                        </div>
                        <div>
                            <div class="btn btn-success btn-sm rounded-3 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="15" height="15"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg> Download Semua
                            </div>
                            <div data-bs-toggle="modal" data-bs-target="#modal-create" class="btn btn-sm rounded-3"
                                style="background-color:#1B3061; color:white;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                                        fill="white" />
                                </svg> Upload Progress
                            </div>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                    <th>file</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>08-05-2023</td>
                                    <td>18-05-2023</td>
                                    <td>Menyelesaikan CRUD Laracel dan Re-desain Figma Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit. Maecenas eu scelerisque felis. Maecenas dolor tortor,
                                        tincid....</td>
                                    <td>
                                        <a href="{{ route('detail-progress') }}" class="btn btn-sm rounded-3" style="background-color: #1B3061;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none">
                                                <path d="M4.5 12.5C7.5 6 16.5 6 19.5 12.5" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16Z"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="btn btn-success btn-sm rounded-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-xl" id="modal-create" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div style="background-color: #1B3061;">
                    <h5 class="modal-title text-white text-center m-3 fs-4">Tambah Progress</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="" id="">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                <label class="form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="" id="">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3 ajax-select mt-3 mt-lg-0">
                                <label class="form-label">Upload File</label>
                                <input class="form-control" type="file" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-label" for="">Deskripsi</label>
                            <textarea class="form-control" name="" id="" cols="20" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="d-flex d-row justify-content-end mt-3">

                        <button type="button" class="btn btn-danger btn-md me-2" data-bs-dismiss="modal"
                        aria-label="Close">Batal</button>
                            <button type="submit" style="background-color: #1B3061; color:white;" class="btn btn-md">Tambah</button>

                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
