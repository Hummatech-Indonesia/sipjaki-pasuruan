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
            <button data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl" class="btn text-white"
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
    <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('training.store') }}" id="form-create" method="post">
                        @csrf
                        @method('POST')
                        <div id="basic-example">
                            <!-- Seller Details -->
                            <h3>Data 1</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Tahun Anggaran</label>
                                            <select name="fiscal_year_id" class="form-select " id="list-fiscal-year">
                                                <option value="">Pilih Tahun Anggaran</option>
                                            </select>
                                            @error('fiscal_year_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Sumber Dana</label>
                                            <select name="" class="form-select" id="list-fund-source">
                                                <option value="">Pilih Kualifikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Nama</label>
                                            <input name="name" type="text" class="form-control" id="basicpill-phoneno-input"
                                                placeholder="Enter Your Name.">
                                                @error('name')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-phoneno-input">Kualifikasi</label>
                                            <select name="" class="form-select " id="list-qualifications">
                                                <option value="">Pilih Kualifikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Jenjang KKNI</label>
                                            <select name="qulification_level_id" class="form-select "
                                                id="list-qualification-level">
                                                <option value="">Pilih Kualifikasi</option>
                                            </select>
                                            @error('qulification_level_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Klasifikasi</label>
                                            <select name="" class="form-select" id="list-classifications">
                                                <option value="">Pilih Kualifikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Sub Klasifikasi</label>
                                            <select name="sub_classification_id" class="form-select" id="list-sub-classifications">
                                            </select>
                                            @error('sub_classification_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Company Document -->
                            <h3>Data 2</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-phoneno-input">Waktu Pelaksanaan</label>
                                            <input name="start_at" type="date" class="form-control" id="basicpill-phoneno-input"
                                                placeholder="Enter Your Name.">
                                                @error('start_at')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Selesai Pelaksanaan</label>
                                            <input name="end_time" type="date" class="form-control" id="basicpill-phoneno-input"
                                                placeholder="Enter Your Name.">
                                                @error('end_time')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Jam Pelajaran</label>
                                            <input type="text" name="lesson_hour" class="form-control" id="basicpill-phoneno-input"
                                                placeholder="Enter Your Name.">
                                                @error('lesson_hour')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Metode Pelatihan</label>
                                            <select name="" class="form-select" id="">
                                                <option value="1">ww</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="basicpill-lastname-input">Lokasi</label>
                                        <textarea name="location" id="" class="form-control"></textarea>
                                        @error('location')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="basicpill-lastname-input">Keterangan</label>
                                        <textarea name="description" id="" class="form-control"></textarea>
                                        @error('description')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
                </div>
                <form action="">
                    <div class="card-body">
                        <div id="basic-update">
                            <!-- Seller Details -->
                            <h3>Data 1</h3>
                            <section>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">Tahun Anggaran</label>
                                                <select name="" class="form-select" id="">
                                                    <option value="">Pilih anggaran</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-lastname-input">Sumber Dana</label>
                                                <select name="" class="form-select" id="">
                                                    <option value="">Pilih sumber dana</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-phoneno-input">Nama</label>
                                                <input type="text" class="form-control" id="basicpill-phoneno-input"
                                                    placeholder="Enter Your Name.">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-email-input">Kualifikasi</label>
                                                <select name="" class="form-select" id="">
                                                    <option value="">Pilih Kualifikasi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </form>
                            </section>

                            <!-- Company Document -->
                            <h3>Data 2</h3>
                            <section>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input">Sub Klasifikasi</label>
                                                <select name="" class="form-select" id="">
                                                    <option value="">Pilih Kualifikasi</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-vatno-input">Waktu Pelaksanaan</label>
                                                <input type="date" class="form-control" id="basicpill-vatno-input"
                                                    placeholder="Enter Your VAT/TIN No.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cstno-input">Selesai Pelaksanaan</label>
                                                <input type="date" class="form-control" id="basicpill-cstno-input"
                                                    placeholder="Enter Your CST No.">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-servicetax-input">Jam Pelajaran</label>
                                                <input type="date" class="form-control"
                                                    id="basicpill-servicetax-input"
                                                    placeholder="Enter Your Service Tax No.">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </section>

                            <!-- Bank Details -->
                            <h3>Data 3</h3>
                            <section>
                                <div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-phoneno-input">Jenjang KKNI</label>
                                                    <select name="" class="form-select" id="">
                                                        <option value="">Pilih Jenjang KKNI</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Klasifikasi</label>
                                                    <select name="" class="form-select" id="">
                                                        <option value="">Pilih Klasifikasi</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-phoneno-input">Lokasi</label>
                                                    <textarea name="" id="" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Keterangan</label>
                                                    <textarea name="" id="" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            <!-- Confirm Details -->
                            <h3>Data 4</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-companyuin-input">Metode Pelatihan</label>
                                            <select name="dinas_id" class="form-select" id="">
                                                <option value="2">Pilih Metode Pelatihan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-declaration-input">Jam Pelajaran</label>
                                            <input type="text" class="form-control" id="basicpill-Declaration-input"
                                                placeholder="Declaration Details">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="row mt-4">
        @forelse ($trainings as $training)
            <div class="col-12 col-lg-6 col-xxl-4">
                <div class="card ">
                    <div class="card-body">
                        <div class="badge bg-light text-info">
                            <p class="mb-0 px-3 py-1 fs-6">
                                2022
                            </p>
                        </div>
                        <div class="">
                            <p class="mb-0 mt-3 fs-4" style="font-weight: 600">
                                Bimtek SMKK
                            </p>
                            <p>
                                Dinas Bina marga dan bina Konstruksi
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
                                <button class="btn text-white" style="background-color: #1B3061">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            data kosong
        @endforelse
    </div>
@endsection
@section('script')
    <script>
        function get() {
            $.ajax({
                url: "{{ route('list-classifications') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-classifications').append(option);
                    });

                    // Tambahkan event listener untuk perubahan pemilihan klasifikasi
                    $('#list-classifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        $('#list-sub-classifications')
                    .empty(); // Kosongkan subklasifikasi sebelum mengambil yang baru

                        if (selectedClassificationId !== '') {
                            subclassifications(
                            selectedClassificationId); // Panggil fungsi subclassifications dengan ID klasifikasi yang dipilih
                        }
                    });
                }
            });
        }
        qualifications()
        function qualifications() {
            $.ajax({
                url: "{{ route('list-qualifications') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-qualifications').append(option);
                    });

                    // Tambahkan event listener untuk perubahan pemilihan klasifikasi
                    $('#list-qualifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        $('#list-qualification-level')
                    .empty(); // Kosongkan subklasifikasi sebelum mengambil yang baru

                        if (selectedClassificationId !== '') {
                            listqualificationlevel(
                            selectedClassificationId); // Panggil fungsi subclassifications dengan ID klasifikasi yang dipilih
                        }
                    });
                }
            });
        }
        listfiscalyear()
        function listfiscalyear() {
            $.ajax({
                url: "{{ route('list-fiscal-year') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-fiscal-year').append(option);
                    });
                }
            });
        }
        listfundsource()
        function listfundsource() {
            $.ajax({
                url: "{{ route('list-fund-source') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-fund-source').append(option);
                    });
                }
            });
        }

        function subclassifications(classificationId) {
            $.ajax({
                url: "list-sub-classifications/" + classificationId,
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-sub-classifications').append(option);
                    });
                }
            });
        }
        function listqualificationlevel(classificationId) {
            $.ajax({
                url: "list-qualification-level/" + classificationId,
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-qualification-level').append(option);
                    });
                }
            });
        }

        // Panggil fungsi get untuk mengisi klasifikasi pertama kali
        get();
    </script>
@endsection
