@extends('layouts.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
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
            <button data-bs-toggle="modal" data-bs-target="#modal-create" class="btn text-white"
                style="background-color:#1B3061">
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

                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h3>informasi Umum</h3>
                        <section>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-year">Tahun</label>
                                            <input type="number" class="form-control" name="year" id="basicpill-year"
                                                placeholder="Masukan Tahun">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-name">Nama Pekerjaan</label>
                                            <input type="text" class="form-control" name="name" id="basicpill-name"
                                                placeholder="masukan nama pekerjaan">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-source_found">Sumber Dana</label>
                                            <select name="source_fund" class="form-control select2" style="width:100%"
                                                id="basicpill-source_found">
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
                                            <label for="basicpill-email-input">Penyedia Jasa</label>
                                            <select name="source_fund" class="form-control select2" style="width:100%"
                                                id="basicpill-penyedia-jasa">
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

                        <!-- Company Document -->
                        <h3>Kontrak</h3>
                        <section>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-nilai_kontrak">Nilai Kontrak</label>
                                            <input type="number" class="form-control" name="nilai kontrak"
                                                id="basicpill-nilai_kontrak" placeholder="Masukan nilai kontrak">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-vatno-input">Jenis kontrak</label>
                                            <select name="source_fund" class="form-control select2" style="width:100%"
                                                id="basicpill-jenis-kontrak">
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-cstno-input">karakteristik Kontrak</label>
                                            <select name="karakteristik" class="form-select" id="">
                                                <option value="tahun tunggal">tahun tunggal</option>
                                                <option value="tahun jamak">tahun jamak</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-servicetax-input">Progress Fisik(%)</label>
                                            <input type="number" class="form-control" id="basicpill-servicetax-input"
                                                placeholder="Masukan progress">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-companyuin-input">Progress Fisik Pada</label>
                                            <input type="date" class="form-control" id="basicpill-companyuin-input"
                                                placeholder="Enter Your Company UIN">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-declaration-input">Progress Keuangan(%)</label>
                                            <input type="number" class="form-control" id="basicpill-Declaration-input"
                                                placeholder="Masukan progress keuangan">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>

                        <!-- Bank Details -->
                        <h3>Detail</h3>
                        <section>
                            <div>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-namecard-input">Progress Keuagan Pada</label>
                                                <input type="date" class="form-control" id="basicpill-namecard-input"
                                                    placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <select class="form-select">
                                                    <option selected disabled>Pilih status</option>
                                                    <option value="aktif">Aktif</option>
                                                    <option value="nonaktif">Nonaktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cardno-input">Mulai</label>
                                                <input type="date" class="form-control" id="basicpill-cardno-input"
                                                    placeholder="Credit Card Number">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-card-verification-input">Selesai</label>
                                                <input type="date" class="form-control"
                                                    id="basicpill-card-verification-input"
                                                    placeholder="Credit Verification Number">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div class="row mt-4">
        <div class="col-12 col-xl-4 col-md-6">
            <div class="card p-4">
                <div class="mb-3">
                    <span class="badge fs-6 bg-info text-white">2002</span>
                </div>
                <div class="mb-3">
                    <h4>PJL Kel. Purwosari Kec. Purwosari</h4>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button style="min-width: 90px" class="btn btn-danger">Hapus</button>
                    </div>
                    <div class="col-4">
                        <button style="min-width: 90px" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#modal-update">Edit</button>
                    </div>
                    <div class="col-4">
                        <button style="min-width: 90px;background-color: #1B3061" class="btn text-white">Detail</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-xl" id="modal-update" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
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
                                            <label for="basicpill-year">Tahun</label>
                                            <input type="number" class="form-control" name="year"
                                                id="basicpill-year" placeholder="Masukan Tahun">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-name">Nama Pekerjaan</label>
                                            <input type="text" class="form-control" name="name"
                                                id="basicpill-name" placeholder="masukan nama pekerjaan">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-source_found">Sumber Dana</label>
                                            <select name="source_fund" class="form-control select2" style="width:100%"
                                                id="basicpill-source_found">
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
                                            <label for="basicpill-email-input">Penyedia Jasa</label>
                                            <select name="source_fund" class="form-control select2" style="width:100%"
                                                id="basicpill-penyedia-jasa">
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

                        <!-- Company Document -->
                        <h3>Kontrak</h3>
                        <section>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-nilai_kontrak">Nilai Kontrak</label>
                                            <input type="number" class="form-control" name="nilai kontrak"
                                                id="basicpill-nilai_kontrak" placeholder="Masukan nilai kontrak">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-vatno-input">Jenis kontrak</label>
                                            <select name="source_fund" class="form-control select2" style="width:100%"
                                                id="basicpill-jenis-kontrak">
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                                <option value="option a">option a</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-cstno-input">karakteristik Kontrak</label>
                                            <select name="karakteristik" class="form-select" id="">
                                                <option value="tahun tunggal">tahun tunggal</option>
                                                <option value="tahun jamak">tahun jamak</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-servicetax-input">Progress Fisik(%)</label>
                                            <input type="number" class="form-control" id="basicpill-servicetax-input"
                                                placeholder="Masukan progress">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-companyuin-input">Progress Fisik Pada</label>
                                            <input type="date" class="form-control" id="basicpill-companyuin-input"
                                                placeholder="Enter Your Company UIN">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-declaration-input">Progress Keuangan(%)</label>
                                            <input type="number" class="form-control" id="basicpill-Declaration-input"
                                                placeholder="Masukan progress keuangan">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>

                        <!-- Bank Details -->
                        <h3>Detail</h3>
                        <section>
                            <div>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-namecard-input">Progress Keuagan Pada</label>
                                                <input type="date" class="form-control" id="basicpill-namecard-input"
                                                    placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <select class="form-select">
                                                    <option selected disabled>Pilih status</option>
                                                    <option value="aktif">Aktif</option>
                                                    <option value="nonaktif">Nonaktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cardno-input">Mulai</label>
                                                <input type="date" class="form-control" id="basicpill-cardno-input"
                                                    placeholder="Credit Card Number">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-card-verification-input">Selesai</label>
                                                <input type="date" class="form-control"
                                                    id="basicpill-card-verification-input"
                                                    placeholder="Credit Verification Number">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>

    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2({
                dropdownParent: $("#modal-create")
            });
        });
    </script>
@endsection
