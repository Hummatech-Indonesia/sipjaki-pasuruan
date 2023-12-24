@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <div class="d-flex">
                <a class="nav-link active rounded-start" style="border: solid 1px #1B3061;" id="detail-tab"
                    data-bs-toggle="pill" href="#detail" role="tab" aria-controls="detail" aria-selected="true">
                    <div class="fw-bold">Paket Konsultan</div>
                </a>
                <a class="nav-link" style="border: solid 1px #1B3061;" id="edit-tab" data-bs-toggle="pill" href="#edit"
                    role="tab" aria-controls="kualifikasi-klasifikasi" aria-selected="false">
                    <div class="fw-bold">Paket Pekerjaan</div>
                </a>
            </div>
        </div>
        <div class="">
            <a class="btn text-white" style="background-color: #1B3061" href="consultant-package">Kembali</a>
        </div>
    </div>
    <div class="tab-content mt-4" id="v-pills-tabContent">
        <div class="tab-pane fade active show" id="detail" role="tabpanel" aria-labelledby="detail-tab">
            <div class="card rounded-4 mb-3">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    2022
                                </div>
                                <p class="fw-bolder fs-5">tes</p>
                            </div>
                            <table cellpadding="10" style="border-collapse: collapse; width: 75%;">
                                <tbody>
                                    <tr>
                                        <td>Nama Paket Konsultan</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Nilai Kontrak</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Progres Fisik</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Progres Keuangan</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Mulai</td>
                                        <td>:</td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Selesai</td>
                                        <td>:</td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Dana</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kontrak</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Karakteristik Kontrak</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="ms-2 fw">
                            <p class="fw-medium fs-5" style="margin-bottom: 25%;">Daftar File</p>
                        </div>
                        <div>
                            <div data-bs-toggle="modal" data-bs-target="#modal-create" class="btn  rounded-3"
                                style="background-color:#1B3061; color:white;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                                        fill="white"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                                        fill="white"></path>
                                </svg> Upload File
                            </div>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th></th>
                                    <th>File</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kontrak</td>
                                    <td>:</td>
                                    <td><a href="" type="button" class="btn btn-md text-white" style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i> Download</a></td>
                                </tr>
                                <tr>
                                    <td>Berita Acara Administrasi
                                        </td>
                                        <td>:</td>
                                    <td><a href="" type="button" class="btn btn-md text-white" style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i> Download</a></td>
                                </tr>
                                <tr>
                                    <td>Laporan</td>
                                        <td>:</td>
                                    <td><a href="" type="button" class="btn btn-md text-white" style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i> Download</a></td>
                                </tr>
                                <tr>
                                    <td>Berita Acara Pencairan</td>
                                        <td>:</td>
                                    <td><a href="" type="button" class="btn btn-md text-white" style="background-color:#1B3061;"><i class="bx bxs-download bx-xs"></i> Download</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <div class="ms-2">
                                <div class="btn btn-sm mb-3 text-dark rounded-3" style="background-color: #E4ECFF;">
                                    2022
                                </div>
                                <p class="fw-bolder fs-5">tes</p>
                            </div>
                            <table cellpadding="10" style="border-collapse: collapse; width: 75%;">
                                <tbody>
                                    <tr>
                                        <td>Nilai Kontrak</td>
                                        <td>:</td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td>Progres Fisik</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Progres Keuangan</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Mulai</td>
                                        <td>:</td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Selesai</td>
                                        <td>:</td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Dana</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kontrak</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Karakteristik Kontrak</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-xl" id="modal-create" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div style="background-color: #1B3061;">
                    <h5 class="modal-title text-white text-center m-3 fs-4">Upload File</h5>
                </div>
                    <form action=""
                        method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Kontrak</label>
                            <input class="form-control" type="file" value="{{ old('contract') }}" name="contract"
                                id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Berita Acara Administrasi</label>
                            <input class="form-control" type="file" value="{{ old('administrative_minutes') }}"
                                name="administrative_minutes" id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Laporan</label>
                            <input class="form-control" type="file" value="{{ old('report') }}" name="report"
                                id="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 ajax-select mt-3 mt-lg-0">
                            <label class="form-label">Berita Acara Pencairan</label>
                            <input class="form-control" type="file" value="{{ old('minutes_of_disbursement') }}"
                                name="minutes_of_disbursement" id="">
                        </div>
                    </div>
                    <div class="d-flex d-row justify-content-end mt-3">
                        <button type="button" class="btn btn-danger btn-md me-2" data-bs-dismiss="modal"
                            aria-label="Close">Batal</button>
                        <button type="submit" style="background-color: #1B3061; color:white;"
                            class="btn btn-md">Tambah</button>

                    </div>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
