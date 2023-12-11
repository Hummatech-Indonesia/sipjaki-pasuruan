@extends('layouts.app')
@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
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
    <div class="modal fade " id="modal-create" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Tahun Anggaran</label>
                                            <select name="fiscal_year_id" class="form-select select2-create"
                                                style="width:100%" id="list-fiscal-year">
                                                <option value="">pilih Tahun anggaran</option>
                                            </select>
                                            @error('fiscal_year_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Nama</label>
                                            <input name="name" type="text" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name.">
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
                                            <select name="" class="form-select select2-create" style="width:100%"
                                                id="list-qualifications">
                                                <option value="">Pilih Kualifikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Jenjang KKNI</label>
                                            <select name="qualification_level_id" class="form-select select2-create"
                                                style="width:100%" id="list-qualification-level">
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
                                            <select name="" class="form-select select2-create" style="width:100%"
                                                id="list-classifications">
                                                <option value="">Pilih klasifikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Sub Klasifikasi</label>
                                            <select name="sub_classifications_id" class="form-select select2-create"
                                                style="width:100%" id="list-sub-classifications">
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
                                            <input name="start_at" type="date" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name.">
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
                                            <input name="end_time" type="date" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name.">
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
                                            <input type="text" name="lesson_hour" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name.">
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
                                            <select name="training_method_id" class="form-select select2-create"
                                                style="width:100%" id="list-training-method">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
                    <button type="button" class="btn-close" style="background-color: white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form id="form-update" method="post">
                        @csrf
                        @method('PUT')
                        <div id="basic-update">
                            <!-- Seller Details -->
                            <h3>Data 1</h3>
                            <section>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Tahun Anggaran</label>
                                            <select name="fiscal_year_id" class="form-select select2-update"
                                                style="width:100%" id="update-list-fiscal-year">
                                                <option value="">Pilih Tahun Anggaran</option>
                                            </select>
                                            @error('fiscal_year_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Nama</label>
                                            <input name="name" type="text" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name.">
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
                                            <select name="" class="form-select select2-update" style="width:100%"
                                                id="update-list-qualifications">
                                                <option value="">Pilih Kualifikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Jenjang KKNI</label>
                                            <select name="qualification_level_id" class="form-select select2-update"
                                                style="width:100%" id="update-list-qualification-level">
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
                                            <select name="" class="form-select select2-update" style="width:100%"
                                                id="update-list-classifications">
                                                <option value="">Pilih Kualifikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Sub Klasifikasi</label>
                                            <select name="sub_classifications_id" class="form-select select2-update"
                                                style="width:100%" id="update-list-sub-classifications">
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
                                            <input name="start_at" type="date" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name.">
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
                                            <input name="end_time" type="date" class="form-control"
                                                id="update-end_time" placeholder="Enter Your Name.">
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
                                            <input type="text" name="lesson_hour" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Your Name.">
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
                                            <select name="training_method_id" class="form-select select2-update"
                                                style="width:100%" id="update-list-training-method">
                                                <option value="">Pilih Metode Pelatihan</option>
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
    <div class="row mt-4">
        @forelse ($trainings as $training)
            <div class="col-12 col-lg-6 col-xxl-4">
                <div class="card ">
                    <div class="card-body">
                        <div class="badge bg-light text-info">
                            <p class="mb-0 px-3 py-1 fs-6">
                                {{ $training->fiscalYear->name }}
                            </p>
                        </div>
                        <div class="">
                            <p class="mb-0 mt-3 fs-4" style="font-weight: 600">
                                {{ $training->name }}
                            </p>
                            <p>
                                {{ $training->description }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-header gap-3 mt-4">
                            <div class="">
                                <button class="btn btn-danger btn-delete" data-id="{{ $training->id }}">
                                    Hapus
                                </button>
                            </div>
                            <div class="">
                                <button class="btn btn-warning btn-edit" id="btn-edit-{{ $training->id }}"
                                    data-id="{{ $training->id }}" data-name="{{ $training->name }}"
                                    data-lesson_hour="{{ $training->lesson_hour }}"
                                    data-start_at="{{ \Carbon\Carbon::parse($training->start_at)->format('Y-m-d') }}"
                                    data-end_time="{{ \Carbon\Carbon::parse($training->end_time)->format('Y-m-d') }}"
                                    data-sub_classifications_id="{{ $training->sub_classifications_id }}"
                                    data-training_method_id="{{ $training->training_method_id }}"
                                    data-location="{{ $training->location }}"
                                    data-qualification_level_id="{{ $training->qualification_level_id }}"
                                    data-description="{{ $training->description }}">
                                    Edit
                                </button>
                            </div>
                            <div class="">
                                <a href="training-members/{{ $training->id }}" class="btn text-white"
                                    style="background-color: #1B3061">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <tr>
                <td colspan="3" class="text-center">
                    <div class="d-flex justify-content-center" style="min-height:16rem">
                        <div class="my-auto">
                            <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                            <h4 class="text-center mt-4">Pelatihan Masih Kosong!!</h4>
                        </div>
                    </div>
                </td>
            </tr>
        @endforelse
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `training.destroy/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
        $(document).ready(function() {
            $(".select2-create").select2({
                dropdownParent: $("#modal-create")
            });
            $(".select2-update").select2({
                dropdownParent: $("#modal-update")
            });
        });
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            console.log(formData);
            var actionUrl = `training.update/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })

        get();

        function get() {
            $.ajax({
                url: "{{ route('list-classifications') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#update-list-classifications').append(option);
                        $('#list-classifications').append(option);
                    });
                    $('#list-classifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        if (selectedClassificationId !== '') {
                            subclassifications(
                                selectedClassificationId
                            );
                        }
                    });
                    $('#update-list-classifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        if (selectedClassificationId !== '') {
                            subclassifications(
                                selectedClassificationId
                            );
                        }
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
                        $('#update-list-sub-classifications').append(option);
                    });
                }
            });
        }
        training_method_id()

        function training_method_id() {
            $.ajax({
                url: "{{ route('list-training-method') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`
                        $('#list-training-method').append(option);
                        $('#update-list-training-method').append(option);
                    });
                    
                    // Mendapatkan nilai fiscal_year_id dari data training
                    var fiscalYearId = "{{ $training->training_method_id }}";

                    // Mengatur nilai fiscal_year_id pada elemen select2
                    $('#update-list-training-method').val(fiscalYearId).trigger('change');
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
                        $('#update-list-qualifications').append(option);
                    });
                    $('#list-qualifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        $('#list-qualification-level')
                        $('#update-list-qualification-level')
                            .empty();

                        if (selectedClassificationId !== '') {
                            listqualificationlevel(
                                selectedClassificationId
                            );
                        }
                    });
                    $('#update-list-qualifications').change(function() {
                        var selectedClassificationId = $(this).val();
                        $('#list-qualification-level')
                        $('#update-list-qualification-level')
                            .empty();
                        if (selectedClassificationId !== '') {
                            listqualificationlevel(
                                selectedClassificationId
                            );
                        }
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
                        $('#update-list-qualification-level').append(option);
                    });
                }
            });
        }

        listfiscalyear();
        function listfiscalyear() {
            $.ajax({
                url: "{{ route('list-fiscal-year') }}",
                type: 'GET',
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(index, item) {
                        var option = `<option value="${item.id}">${item.name}</option>`;
                        $('#update-list-fiscal-year').append(option);
                    });

                    // Mendapatkan nilai fiscal_year_id dari data training
                    var fiscalYearId = "{{ $training->fiscal_year_id }}";

                    // Mengatur nilai fiscal_year_id pada elemen select2
                    $('#update-list-fiscal-year').val(fiscalYearId).trigger('change');
                }
            });
        }
    </script>
@endsection
